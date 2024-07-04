<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function list() {
        $title = 'List Comment';
        $comments = Comment::get();
        return view('admins.comment.list', compact('title', 'comments'));
    }
}
