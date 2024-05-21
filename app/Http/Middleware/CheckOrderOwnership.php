<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOrderOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $orderId = $request->route('id'); // Ambil nilai parameter 'id' dari URL
        $order = Order::find($orderId);

        // Pastikan bahwa user yang sedang login adalah pemilik order
        if ($order && Auth::user()->id === $order->user_id) {
            return $next($request);
        }

        // Jika bukan pemilik, redirect atau kembalikan respons sesuai kebutuhan Anda
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke history order ini.');
    }
}
