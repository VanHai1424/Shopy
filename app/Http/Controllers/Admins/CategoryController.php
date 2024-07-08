<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Category';
        $categories = Category::with('parent')->get();
        return view('admins.category.list', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Category';
        $categoryParent = Category::where('parent_id', 0)->get();
        return view('admins.category.add', compact('title', 'categoryParent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'name.required' => 'Tên là bắt buộc',
            'img.required' => 'Vui lòng chọn một hình ảnh.',
            'img.image' => 'Tệp phải là hình ảnh.',
            'img.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'img.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $filename = ImageHelper::uploadImage($req->img, 'categories');
            Category::create([
                'name' => $req->name,
                'parent_id' => $req->parent_id,
                'img' => $filename
            ]);
            DB::commit();
            return redirect()->route('category.index')->with([
                'msg' => 'Thêm thành công',
                'alert-type' => 'success'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Update Category';
        $category = Category::find($id);
        $categoryParent = Category::where('parent_id', 0)->get();
        return view('admins.category.update', compact('title', 'category', 'categoryParent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'name.required' => 'Tên là bắt buộc',
            'img.required' => 'Vui lòng chọn một hình ảnh.',
            'img.image' => 'Tệp phải là hình ảnh.',
            'img.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'img.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $category = Category::find($id);
            if(!ImageHelper::removeImage($category->img, 'categories')) {
                throw new Exception();
            }
            $filename = ImageHelper::uploadImage($req->img, 'categories');
            $category->update([
                'name' => $req->name,
                'parent_id' => $req->parent_id,
                'img' => $filename
            ]);
            DB::commit();
            return redirect()->route('category.index')->with([
                'msg' => 'Cập nhật thành công',
                'alert-type' => 'success'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with([
            'msg' => 'Xóa thành công',
            'alert-type' => 'success'
        ]);
    } 
}
