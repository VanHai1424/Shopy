<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $title = 'Dashboard';
        $orderCount = Order::count();
        $customers = User::where('role', 1)->count();
        $total = Order::where('status', 4)->sum('total');
        $orders = Order::orderBy('id', 'desc')->limit(5)->get();
        return view('admins.dashboard', compact('title', 'orders', 'customers', 'total', 'orderCount'));
    }
}
