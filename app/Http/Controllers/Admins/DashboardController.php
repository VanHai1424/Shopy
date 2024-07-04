<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $title = 'Dashboard';
        return view('admins.dashboard', compact('title'));
    }
}
