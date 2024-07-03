<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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

    public function searchProducts(Request $req) {
        $title = 'Sản phẩm';
        $perPage = 6;
        $category = null;
        $products = Product::where('name', 'like', '%'.$req->keyw.'%')->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();
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
        $html = view('blocks.clients.filtered-products', compact('products'))->render();
    
        return response()->json([
            'html' => $html
        ]);
    }

    public function productDetail(Request $req) {
        $title = 'Chi tiết sản phẩm';
        $product = Product::with('variants')->findOrFail($req->id);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '<>', $product->id)->get();
        $variants = $product->variants;
        $sizes = $variants->pluck('size')->unique();
        $colors = $variants->pluck('color')->unique();
        $imgs = $variants->pluck('img')->take(4)->unique();
        $imgs = $imgs->prepend($product->thumbnail);
        $comments = $product->comments->sortByDesc('created_at');
        return view('clients.product-detail', compact('title', 'product', 'imgs', 'colors', 'sizes', 'relatedProducts', 'comments'));
    }
    
    public function filterVariant(Request $req) {
        $products = Product::with(['variants' => function($query) use ($req) {
            $query->where('size_id', $req->idSize);
        }])->findOrFail($req->route()->id);
        $colorIds = $products->variants->pluck('color_id');
        $colors = Color::select('id', 'name')->whereIn('id', $colorIds)->get();

        $html = view('blocks.clients.filtered-variants')->with(compact('colors'))->render();
        return response()->json([
            'html' => $html
        ]);
    }

    public function comment(Request $req) {
        $comment = Comment::create([
            'content' => $req->content,
            'user_id' => Auth::user()->id,
            'product_id' => $req->productId,
        ]);
        $comments = Comment::where('product_id', $req->productId)->orderBy('created_at', 'desc')->get();
        $html = view('blocks.clients.comment', compact('comments'))->render();
        return response()->json([
            'html' => $html
        ]);
    }

    public function cart() {
        $title = 'Giỏ hàng';
        $cart = session()->get('cart', []);
        $totalPrice = 0;
        foreach ($cart as $key => $value) {
            $totalPrice += $value['product']['price'] * $value['quantityOrder'];
        }
        return view('clients.cart', compact('title', 'cart', 'totalPrice'));
    }

    public function addToCart(Request $req) {
        try {
            $colorId = $req->colorId;
            $sizeId = $req->sizeId;
            $variant = Variant::with(['product', 'color', 'size'])
                            ->where('product_id', $req->id)
                            ->where('color_id', $colorId)
                            ->where('size_id', $sizeId)
                            ->first();

            if (!$variant) {
                throw new Exception('Lỗi');
            } else {
                $cart = session()->get('cart', []);

                if (isset($cart[$variant->id])) {
                    $cart[$variant->id]['quantityOrder'] += 1;
                } else {
                    $variantArray = $variant->toArray();
                    $variantArray['quantityOrder'] = 1;
                    $cart[$variant->id] = $variantArray;
                }

                session()->put('cart', $cart);
            }

        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateQuantity(Request $req) {
        $cart = session()->get('cart', []);
        if($req->data['value'] == 'plus') {
            $cart[$req->data['id']]['quantityOrder'] += 1;
            if($cart[$req->data['id']]['quantityOrder'] > $cart[$req->data['id']]['quantity']) {
                $cart[$req->data['id']]['quantityOrder'] = $cart[$req->data['id']]['quantityOrder'] = $cart[$req->data['id']]['quantity']; 
            }
        } else {
            $cart[$req->data['id']]['quantityOrder'] -= 1;
            if($cart[$req->data['id']]['quantityOrder'] <= 0) {
                $cart[$req->data['id']]['quantityOrder'] = 1; 
            }
        }
        session()->put('cart', $cart);
        $totalPrice = 0;
        foreach ($cart as $key => $value) {
            $totalPrice += $value['product']['price'] * $value['quantityOrder'];
        }
        $html = view('blocks.clients.cart-table', compact('cart', 'totalPrice'))->render();
        return response()->json(['html' => $html]);
    }   

    public function removeToCart(Request $req) {
        $cart = session()->get('cart', []);
        // return response()->json([
        //     'data' => $cart,
        //     'id' => $req->id
        // ]);
        unset($cart[$req->id]);

        session()->put('cart', $cart);
        $totalPrice = 0;
        foreach ($cart as $key => $value) {
            $totalPrice += $value['product']['price'] * $value['quantityOrder'];
        }
        $html = view('blocks.clients.cart-table', compact('cart', 'totalPrice'))->render();
        return response()->json(['html' => $html]);
    }

    public function checkout() {
        if(session()->get('cart', [])) {
            $title = 'Thanh toán';
            return view('clients.checkout', compact('title'));
        } else {
            return redirect()->back()->with('alert', 'Bạn chưa chọn sản phẩm nào');
        }
    }
}
