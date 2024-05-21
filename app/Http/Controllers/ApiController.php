<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function callback(Request $request)
    {

        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key)
        {
            if($request->transaction_status == 'capture')
            {
                $order = Order::find($request->order_id);
                $order->update(['status' => '1']);

                $order_id = $order->id;
                $order_details = OrderDetail::where('order_id', $order_id)->get();
                foreach ($order_details as $order_detail) {
                    $product = Product::where('id', $order_detail->product_id)->first();
                    $product->stock = $product->stock-$order_detail->total;
                    $product->update();
                }
            }

            if($request->transaction_status == 'settlement')
            {
                $order = Order::find($request->order_id);
                $order->update(['status' => '1']);

                $order_id = $order->id;
                $order_details = OrderDetail::where('order_id', $order_id)->get();
                foreach ($order_details as $order_detail) {
                    $product = Product::where('id', $order_detail->product_id)->first();
                    $product->stock = $product->stock-$order_detail->total;
                    $product->update();
                }
            }
        }
        
    }
}
