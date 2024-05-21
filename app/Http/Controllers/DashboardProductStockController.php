<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class DashboardProductStockController extends Controller
{
    public function notifStock()
    {
        $lowStocks = Product::where('stock', '<', 3)->orderBy('stock', 'asc')->paginate(10);

        return view('admin.shop.lowstock', compact('lowStocks'));
    }
}
