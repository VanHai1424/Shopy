<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list() {
        $title = 'List User';
        $users = User::get();
        return view('admins.user.list', compact('title', 'users'));
    }
}
