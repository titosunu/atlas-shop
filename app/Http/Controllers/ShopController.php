<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->input('category');
        $sort = $request->input('sort');

        $query = Product::query();

        if ($categoryId) {
            $category = Category::find($categoryId);
            $query->whereHas('category', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
        }

        if ($sort === 'high-to-low') {
            $query->orderByDesc('price');
        } elseif ($sort === 'low-to-high') {
            $query->orderBy('price');
        }

        $products = $query->paginate(9);

        $totalProducts = Product::count();

        // Menambahkan appends sesuai parameter yang aktif
        $appends = [];
        if ($categoryId) {
            $appends['category'] = $categoryId;
        }
        if ($sort) {
            $appends['sort'] = $sort;
        }

        return view('shop', compact('products', 'categories', 'totalProducts'))
            ->with('appends', $appends);

    }
}
