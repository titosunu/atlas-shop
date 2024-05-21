<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $product = Product::where('id', $id)->first();

        $category = Category::all();

        // get all rating product

        $ratings = Rating::with('user')->where('status',0)->where('product_id', $id)->orderBy('id', 'desc')->get();

        // get avarage rating of product

        $ratingsSum = Rating::where('status',0)->where('product_id', $id)->sum('rating');

        $ratingsCount = Rating::where('status',0)->where('product_id', $id)->count();

        if ($ratingsCount>0) {
            $avgRating = round($ratingsSum/$ratingsCount,2);
    
            $avgStarRating = round($ratingsSum/$ratingsCount);
        } else {
            $avgRating = 0;

            $avgStarRating = 0;
        }

        $userCounts = [];
        for ($i = 1; $i <= 5; $i++) {
            $userCount = Rating::where('product_id', $product->id)
                ->where('rating', $i)
                ->distinct('user_id')
                ->count();
            $userCounts[$i] = $userCount;
        }


        return view('order.index', compact('product', 'category', 'ratings', 'avgRating', 'avgStarRating', 'ratingsCount', 'userCounts'));
    }

    public function order(Request $request, $id)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->address))
        {
            return redirect('profile')->withError('identitas!');
        }

        if(empty($user->nohp))
        {
            return redirect('profile')->withError('identitas!');
        }

        if(empty($user->city_id))
        {
            return redirect('profile')->withError('identitas!');
        }
        

        $product = Product::where('id', $id)->first();
        $date = Carbon::now();

        // validasi stock

        if($request->total_order > $product->stock)
        {
            return redirect('message/'.$id);
        }

        //cek validasi

        $cek_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // simpan database order

        if (empty($cek_order))
        {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->date = $date;
            $order->status = 0;
            $order->total_price = 0;
            $order->tax = 0;
            $order->save();
        }

        // simpan database order detail

        $order_new = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek order detail

        $cek_order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $order_new->id)->first();

        if (empty($cek_order_detail)) 
        {
            $order_detail = new OrderDetail;
            $order_detail->product_id = $product->id;
            $order_detail->order_id = $order_new->id;
            $order_detail->total = $request->total_order;
            $order_detail->total_price = $product->price*$request->total_order;
            $order_detail->save();
        }else
        {
            $order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $order_new->id)->first();

            $order_detail->total = $order_detail->total+$request->total_order;

            // price sekarang

            $price_order_detail_new = $product->price*$request->total_order;
            $order_detail->total_price = $order_detail->total_price+$price_order_detail_new;
            $order_detail->update();
        }

        // jumlah total

        $cost = RajaOngkir::ongkosKirim([
            'origin' => $request->destination,
            'destination' => $user->city_id,
            'weight' => $request->weight,
            'courier' => $request->code,
        ])->get();
        
        $biayaPengiriman = $cost[0]['costs'][0]['cost'][0]['value'];
        
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        if ($order->tax <= 0) {
            $order->tax += $biayaPengiriman;
            $order->total_price = $order->total_price+$product->price*$request->total_order+$order->tax;
            $order->update();
        } else {
            $order->total_price = $order->total_price+$product->price*$request->total_order;
            $order->update();
        }

        return redirect('shop')->withSuccess('Added to cart successfully!');
    }

    public function check_out()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order_details = [];
        if (!empty($order)) 
        {
            $order_details = OrderDetail::where('order_id', $order->id)->get();
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $timestamp = now()->timestamp;

        $generateorderid = $order->id;

        $orderIdWithTimestamp = $generateorderid . '-' . $timestamp;

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderIdWithTimestamp,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name' => $order->user->name,
                'last_name' => '',
                'email' => $order->user->email,
                'phone' => $order->user->nohp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('order.check_out', compact('order', 'order_details', 'snapToken'));
    }

    public function delete($id)
    {
        $order_detail = OrderDetail::where('id', $id)->first();

        $order = Order::where('id', $order_detail->order_id)->first();
        $order->total_price = $order->total_price-$order_detail->total_price;
        $order->update();

        $order_detail->delete();

        if (!$order->order_id) {
            $order->delete();
        }

        return redirect('shop')->withSuccess('Item Successfully Deleted!');
    }
}
