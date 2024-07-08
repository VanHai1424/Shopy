<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Color';
        $colors = Color::get();
        return view('admins.color.list', compact('title', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Color';
        return view('admins.color.add', compact('title'));
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
        Color::create([
            'name' => $req->name
        ]);
        return redirect()->route('color.index')->with([
            'msg' => 'Thêm thành công',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Update Color';
        $color = Color::find($id);
        return view('admins.color.update', compact('title', 'color'));
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
        $color = Color::find($id);

        $color->update([
            'name' => $req->name
        ]);
        return redirect()->route('color.index')->with([
            'msg' => 'Cập nhật thành công',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::find($id);

        $color->delete();
        return redirect()->route('color.index')->with([
            'msg' => 'Xóa thành công',
            'alert-type' => 'success'
        ]);
    }
}
