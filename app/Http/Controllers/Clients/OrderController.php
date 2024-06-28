<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class OrderController extends Controller
{
    public function getProducts(Request $req) {
        $title = 'Sản phẩm';
        $perPage = 6;
        $category = Category::with('childrens.products')->findOrFail($req->id);
        $products = collect();
    
        if ($category->parent_id == 0) {
            foreach ($category->childrens as $childCategory) {
                $products = $products->merge($childCategory->products);
            }
            $products = $products->sortByDesc('created_at');
            $currentPage = Paginator::resolveCurrentPage();
            $currentPageItems = $products->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $products = new LengthAwarePaginator($currentPageItems, $products->count(), $perPage);
            $products->setPath($req->url());
        } else {
            $products = $category->products()->orderBy('created_at', 'desc')->paginate($perPage);
        }

        $sizes = Size::get();
        $colors = Color::get();

        return view('clients.products', compact('title', 'category', 'products', 'sizes', 'colors'));
    }

    public function filterProducts(Request $req) {
        $sizes = $req->data['size'] ?? [];
        $colors = $req->data['color'] ?? [];
        $categoryId = intval($req->route('id')); 
        if(Category::find($categoryId)->parent_id == 0) {
            $childCategoryIds = Category::where('parent_id', $categoryId)->pluck('id');
            $query = Product::whereIn('category_id', $childCategoryIds);
        } else {
            $query = Product::where('category_id', $categoryId);
        }
        $query->whereHas('variants', function ($query) use ($sizes, $colors) {
            if (!empty($sizes)) {
                $query->whereIn('size_id', $sizes);
            }
            if (!empty($colors)) {
                $query->whereIn('color_id', $colors);
            }
        });
        $products = $query->orderBy('created_at', 'desc')->paginate(6);
        $html = view('clients.filtered-products', compact('products'))->render();
    
        return response()->json([
            'html' => $html
        ]);
    }
    
}
