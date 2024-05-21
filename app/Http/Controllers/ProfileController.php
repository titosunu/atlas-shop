<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $couriers = Courier::pluck('title', 'code');

        $provinces = Province::pluck('title', 'province_id');

        return view('profile.index', compact('user', 'couriers', 'provinces'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');

        return json_encode($city);
    }

    public function update(Request $request)
    {
            // Validasi hanya jika password diisi
        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'confirmed|min:6',
            ]);
        }

        // Peroleh pengguna dari database
        $user = User::where('id', Auth::user()->id)->first();

        // Perbarui informasi pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->address = $request->address;
        $user->city_id = $request->city_id;

        // Perbarui password jika diisi
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        return redirect('profile')->with('success', 'Pembaruan berhasil');
    }
}
