<?php

namespace App\Http\Controllers;

use App\Exports\ExportOrder;
use App\Models\Order;
use App\Models\OrderDetail;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class DashboardOrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::paginate(10)
        ]);
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->first();

        $order_details = OrderDetail::where('order_id', $order->id)->first();
        
        return view('admin.order.detail', compact('order', 'order_details'));
    }

    public function resi(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();

        $order->resi = $request->resi;

        $order->update();

        return redirect('/dashboard/order')->withSuccess('Sukses update resi');
    }

    public function export_excel()
    {
        $selectedMonth = request('selected_month');

        $data = Order::whereMonth('date', '=', $selectedMonth)->where('status', '!=',0)->get();

        $filename = sprintf('data_bulan_%s.xlsx', $selectedMonth);

        return Excel::download(new ExportOrder($data), $filename);
    }
}
