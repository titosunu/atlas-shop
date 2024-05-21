<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('history.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->first();

        $order_details = OrderDetail::where('order_id', $order->id)->get();
        
        return view('history.detail', compact('order', 'order_details'));
    }

    public function exportPdf($id)
    {
        $order = Order::where('id', $id)->first();

        $order_details = OrderDetail::where('order_id', $order->id)->get();

        $pdf = Pdf::loadView('history.pdf.invoice', ['order' => $order, 'order_details' => $order_details]);

        return $pdf->download('invoice-'.Carbon::now()->timestamp.'.pdf');
    }
}
