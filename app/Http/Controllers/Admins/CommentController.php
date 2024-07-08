<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'List Comment';
        $comments = Comment::get();
        return view('admins.comment.list', compact('title', 'comments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);

        $comment->delete();
        return redirect()->route('comment.index')->with([
            'msg' => 'Xóa thành công',
            'alert-type' => 'success'
        ]);
    }
}
