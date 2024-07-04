<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list() {
        $title = 'List Category';
        $categories = Category::with('parent')->get();
        return view('admins.category.list', compact('title', 'categories'));
    }
}
