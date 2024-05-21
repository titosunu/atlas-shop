<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class DashboardHomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.home_banner.index', [
            'homebanners' => HomeBanner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('admin.home_banner.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sub_title' => 'required|max:255',
            'title' => 'required|max:255',
            'title_stroke' => 'required|max:255',
            'btn_txt' => 'required|max:255',
            'image' => 'required|image|file|max:5000',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('home-banner-images');
        }

        HomeBanner::create($validatedData);

        return redirect('/dashboard/home-banners')->with('success', 'Add Banner has been successed!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeBanner $homeBanner)
    {
        return view('admin.home_banner.edit', [
            'homebanner' => $homeBanner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeBanner $homeBanner)
    {
        $rules = [
            'sub_title' => 'required|max:255',
            'title' => 'required|max:255',
            'title_stroke' => 'required|max:255',
            'btn_txt' => 'required|max:255',
            'image' => 'required|image|file|max:5000',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('home-banner-images');
        }

        HomeBanner::where('id', $homeBanner->id)
                ->update($validatedData);

        return redirect('/dashboard/home-banners')->with('success', 'Banner has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeBanner $homeBanner)
    {
        if ($homeBanner->image) {
            Storage::delete($homeBanner->image);
        }

        HomeBanner::destroy($homeBanner->id);

        return redirect('/dashboard/home-banners')->with('success', 'Product has been deleted!');
    }
}
