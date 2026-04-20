<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')->count();

        $totalRevenue = Order::sum('total');

        $totalProducts = Product::count();

        $totalUsers = User::count();

        $latestOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'totalRevenue',
            'totalProducts',
            'totalUsers',
            'latestOrders'
        ));
    }
}
