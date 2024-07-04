<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function list() {
        $title = 'List Color';
        $colors = Color::get();
        return view('admins.color.list', compact('title', 'colors'));
    }
}
