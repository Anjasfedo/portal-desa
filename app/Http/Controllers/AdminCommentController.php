<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCommentController extends Controller
{
    public function index()
    {
        return view('admin.komentar.index', [
            'comments'  => Comment::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/admin/komentar')->with('success', 'Berhasil menghapus komentar !');
    }
}
