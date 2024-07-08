<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Order';
        $orders = Order::get();
        return view('admins.order.list', compact('title', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Order Detail";
        $order = Order::with(['orderDetail.variant.product', 'user'])->find($id);
        return view('admins.order.detail', compact('title', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $req, $id) {
        $order = Order::find($id);
        $order->status = $req->status;
        $order->save();
        return redirect()->back()->with([
            'msg' => 'Cập nhật trạng thái thành công',
            'alert-type' => 'success'
        ]);
    }
}
