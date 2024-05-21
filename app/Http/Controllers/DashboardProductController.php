<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->input('category');

        if ($categoryId) {
            $category = Category::find($categoryId);
            $products = $category->products()->paginate(10);
            $products->appends(['category' => $categoryId]);
        } else {
            $products = Product::paginate(10);
        }

        foreach ($products as $product) {
            if ($product->stock < 3) {
                Alert::warning('Cek stock', 'Ada Stock Product yang akan habis')->autoclose(false);
            }
        }

        return view('admin.shop.index', compact('products', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shop.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_product' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'image' => 'required|image|file|max:5000',
            'stock' => 'required|numeric|min:0',
            'category_id' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validatedData);

        return redirect('/dashboard/products')->with('success', 'New product has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.shop.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.shop.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name_product' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'image' => 'image|file|max:5000',
            'stock' => 'required|numeric|min:0',
            'category_id' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $product->id)
                ->update($validatedData);

        return redirect('/dashboard/products')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        Product::destroy($product->id);

        return redirect('/dashboard/products')->with('success', 'Product has been deleted!');
    }
}
