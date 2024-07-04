<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function list() {
        $title = 'List Size';
        $sizes = Size::get();
        return view('admins.size.list', compact('title', 'sizes'));
    }
}
