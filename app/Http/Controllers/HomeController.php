<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homebanners = HomeBanner::all();

        $categories = Category::take(4)->get();

        $products = Product::take(7)->get();
        return view('home', compact('products', 'homebanners', 'categories'));
    }
}
