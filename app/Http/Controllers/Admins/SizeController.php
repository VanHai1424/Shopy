<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Size';
        $sizes = Size::get();
        return view('admins.size.list', compact('title', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm mới';
        return view('admins.size.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Tên là bắt buộc',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Size::create([
            'name' => $req->name
        ]);
        return redirect()->route('size.index')->with([
            'msg' => 'Thêm thành công',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Chỉnh sửa';
        $size = Size::find($id);
        return view('admins.size.update', compact('title', 'size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Tên là bắt buộc',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $size = Size::find($id);

        $size->update([
            'name' => $req->name
        ]);
        return redirect()->route('size.index')->with([
            'msg' => 'Cập nhật thành công',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::find($id);

        $size->delete();
        return redirect()->route('size.index')->with([
            'msg' => 'Xóa thành công',
            'alert-type' => 'success'
        ]);
    }
}
