<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list() {
        $title = 'List Order';
        $orders = Order::get();
        return view('admins.order.list', compact('title', 'orders'));
    }
}
    