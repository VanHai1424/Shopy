<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list() {
        $title = 'List Product';
        $products = Product::get();
        return view('admins.product.list', compact('title', 'products'));
    }
}
