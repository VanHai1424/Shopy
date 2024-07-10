<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $title = 'Trang chủ';
        $parentCategories = Category::where('parent_id', 0)->get();
        $data = Category::where('parent_id', '<>', 0)->get();
        $childCategories = [];
        foreach ($data as $key => $value) {
            $childCategories[$value['parent_id']][] = $value;
        }
        $products = Product::where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('index', compact('title', 'parentCategories', 'childCategories', 'products'));
    }
}
