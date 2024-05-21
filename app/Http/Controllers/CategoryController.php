<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($categoryId) {
        $category = Category::find($categoryId); // Mengambil kategori berdasarkan ID
        $products = $category->products()->paginate(9);
        return view('category', ['category' => $category, 'products' => $products]);
    }

    public function view()
    {
        return view('categoryview', [
            'categories' => Category::all()
        ]);
    }
}