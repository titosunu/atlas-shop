<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Charts\MonthlyUsersChart;
use App\Models\Rating;

use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(MonthlyUsersChart $chart)
    {
        // bulan
        $bulan = date('m');
        
        $totalRevenue = Order::where('status', 1)
            ->whereMonth('date', $bulan)
            ->sum('total_price');

        // tahun
        $tahun = date('Y');
        
        $totalAnnualRevenue = Order::where('status', 1)
            ->whereYear('date', $tahun)
            ->sum('total_price');

        // unpaid
        $unpaidCount = Order::where('status', 0) // Ganti kondisi sesuai dengan status pembayaran yang menunjukkan belum dibayarnya
            ->count();

        // rating
        $usersWithRatingCount = Rating::count();

        // top selling

        $topSellingProducts = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name_product',
                'products.image',
                'products.stock',
                DB::raw('SUM(order_details.total) as total_sold')
            )
            ->where('orders.status', '=', '1')
            ->groupBy('products.id', 'products.name_product', 'products.image', 'products.stock')
            ->orderByDesc('total_sold')
            ->take(3) // Ubah angka 5 dengan jumlah top selling products yang ingin Anda ambil
            ->get();

        // target

        $bulan = date('m');
        $targetPenjualanBulanan = 1000000; // Target penjualan per bulan

        $totalRevenue = Order::where('status', 1)
            ->whereMonth('date', $bulan)
            ->sum('total_price');

        $persentasePencapaianTarget = ($totalRevenue / $targetPenjualanBulanan) * 100;

        // Pembulatan persentase ke atas
        $persentasePencapaianTarget = ceil($persentasePencapaianTarget);

        return view('admin.index', [
            'chart' => $chart->build(),
            'topSellingProducts' => $topSellingProducts,
            'persentasePencapaianTarget' => $persentasePencapaianTarget,
            'totalRevenue' => $totalRevenue,
            'totalAnnualRevenue' => $totalAnnualRevenue,
            'unpaidCount' => $unpaidCount,
            'usersWithRatingCount' => $usersWithRatingCount
        ]);
    }
}
