<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Product';
        $products = Product::get();
        return view('admins.product.list', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Product';
        $categories = Category::where('parent_id', '<>', 0)->get();
        $sizes = Size::get();
        $colors = Color::get();
        return view('admins.product.add', compact('title', 'categories', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'desc' => 'required',
            'category' => 'required'

        ], [
            'name.required' => 'Tên là bắt buộc',
            'thumbnail.required' => 'Vui lòng chọn một hình ảnh.',
            'thumbnail.image' => 'Tệp phải là hình ảnh.',
            'thumbnail.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'price.required' => 'Giá là bắt buộc',
            'price.regex' => 'Giá phải là số',
            'desc.required' => 'Mô tả lằ bắt buộc',
            'category.required' => 'Danh mục lằ bắt buộc',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $dataProduct = $req->except('variant');
        $dataProduct['status'] = isset($dataProduct['status']) ? 1 : 0;

        $variants = [];

        foreach ($req->variant as $key => $variant) {
            if (isset($variant['quantity']) && $variant['quantity'] > 0 && isset($variant['img'])) {
                $variants[$key] = $variant;
            }
        }

        if (empty($variants)) {
            return redirect()->back()->withErrors(['variant' => 'Cần ít nhất một biến thể hợp lệ.'])->withInput();
        }

        try {
            DB::beginTransaction();
            $filename = ImageHelper::uploadImage($dataProduct['thumbnail'], 'products');
            $product = Product::create([
                'name' => $dataProduct['name'],
                'thumbnail' => $filename,
                'price' => $dataProduct['price'],
                'desc' => $dataProduct['desc'],
                'status' => $dataProduct['status'],
                'category_id' => $dataProduct['category']
            ]);

            foreach ($variants as $key => $value) {
                $tmp = explode('-', $key);
                $filename = ImageHelper::uploadImage($value['img'], 'products');
                Variant::create([
                    'quantity' => $value['quantity'],
                    'img' => $filename,
                    'product_id' => $product->id,
                    'size_id' => $tmp[0],
                    'color_id' => $tmp[1]
                ]);
            }

            DB::commit();
            return redirect()->route('product.index')->with([
                'msg' => 'Thêm thành công',
                'alert-type' => 'success'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Update Product';
        $product = Product::find($id);
        $categories = Category::where('parent_id', '<>', 0)->get();
        $sizes = Size::get();
        $colors = Color::get();
        $variants = $product->variants;
        return view('admins.product.update', compact('title', 'product', 'categories', 'sizes', 'colors', 'variants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'desc' => 'required',
            'category' => 'required'

        ], [
            'name.required' => 'Tên là bắt buộc',
            'thumbnail.image' => 'Tệp phải là hình ảnh.',
            'thumbnail.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'price.required' => 'Giá là bắt buộc',
            'price.regex' => 'Giá phải là số',
            'desc.required' => 'Mô tả lằ bắt buộc',
            'category.required' => 'Danh mục lằ bắt buộc',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $dataProduct = $req->except('variant');
        $dataProduct['status'] = isset($dataProduct['status']) ? 1 : 0;

        $variants = [];
        foreach ($req->variant as $key => $variant) {
            if (isset($variant['quantity']) && $variant['quantity'] > 0 ) {
                $variants[$key] = $variant;
            }
        }

        if (empty($variants)) {
            return redirect()->back()->withErrors(['variant' => 'Cần ít nhất một biến thể hợp lệ.'])->withInput();
        }

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);
            if ($req->hasFile('thumbnail')) {
                if ($product->thumbnail) {
                    ImageHelper::removeImage($product->thumbnail, 'products');
                }
    
                $filename = ImageHelper::uploadImage($req->file('thumbnail'), 'products');
                $dataProduct['thumbnail'] = $filename;
            }
    
            $product->update([
                'name' => $dataProduct['name'],
                'price' => $dataProduct['price'],
                'desc' => $dataProduct['desc'],
                'status' => $dataProduct['status'],
                'category_id' => $dataProduct['category'],
                'thumbnail' => $dataProduct['thumbnail'] ?? $product->thumbnail 
            ]);
            $existingVariants = $product->variants->keyBy(function ($item) {
                return $item->size_id . '-' . $item->color_id;
            });
            foreach ($variants as $key => $variant) {
                list($sizeId, $colorId) = explode('-', $key);

                // Kiểm tra xem variant đã tồn tại chưa
                if (isset($existingVariants[$key])) {
                    $existingVariant = $existingVariants[$key];
                    // Xóa ảnh cũ nếu có ảnh mới
                    if (isset($variant['img']) && $variant['img']->isValid()) {
                        ImageHelper::removeImage($existingVariant->img, 'products');
                        $variant['img'] = ImageHelper::uploadImage($variant['img'], 'products');
                    } else {
                        unset($variant['img']);
                    }

                    $existingVariant->update([
                        'quantity' => $variant['quantity'],
                        'img' => $variant['img'] ?? $existingVariant->img
                    ]);
                } else {
                    if (isset($variant['img']) && $variant['img']->isValid()) {
                        $variant['img'] = ImageHelper::uploadImage($variant['img'], 'products');
                    }

                    Variant::create([
                        'product_id' => $product->id,
                        'size_id' => $sizeId,
                        'color_id' => $colorId,
                        'quantity' => $variant['quantity'],
                        'img' => $variant['img'] ?? throw new Exception()
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('product.index')->with([
                'msg' => 'Cập nhật thành công',
                'alert-type' => 'success'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['variant' => 'Biến thể phải có số lượng và ảnh.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {
        DB::beginTransaction();

        $product = Product::findOrFail($id);

        foreach ($product->variants as $variant) {
            if ($variant->img) {
                ImageHelper::removeImage($variant->img, 'products');
            }
            $variant->delete();
        }

        if ($product->thumbnail) {
            ImageHelper::removeImage($product->thumbnail, 'products');
        }

        $product->delete();

        DB::commit();

        return redirect()->route('product.index')->with([
            'msg' => 'Xóa thành công',
            'alert-type' => 'success'
        ]);
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->route('product.index')->with([
            'msg' => 'Xóa thất bại',
            'alert-type' => 'danger'
        ]);
    }
}

}
