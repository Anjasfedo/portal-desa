<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentReply;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $validatedData = $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'body'  => 'required',
        ],[
            'nama.required'     => 'Ruas Nama Wajib Diisi !',
            'email.required'    => 'Ruas Email Wajib Diisi !',
            'body.required'     => 'Ruas Body Wajib Diisi !',
        ]);

        $berita = Berita::where('slug', $request->slug)->firstOrFail();
        $validatedData['berita_id'] = $berita->id;

        Comment::create($validatedData);

        alert()->toast('Komentar berhasil dikirimkan', 'success');
        return redirect()->back();
    }

    public function commentReply(Request $request)
    {
        $validatedData = $request->validate([
            'replyNama'  => 'required',
            'replyEmail' => 'required|email',
            'replyBody'  => 'required',
        ],[
            'replyNama.required'     => 'Ruas Nama Wajib Diisi !',
            'replyEmail.required'    => 'Ruas Email Wajib Diisi !',
            'replyBody.required'     => 'Ruas Body Wajib Diisi !',
        ]);

        $berita = Berita::where('slug', $request->slug)->firstOrFail();
        $validatedData['berita_id']     = $berita->id;
        $validatedData['comment_id']    = $request->comment_id;

        $commentReply = New CommentReply();
        $commentReply->nama         = $validatedData['replyNama'];
        $commentReply->email        = $validatedData['replyEmail'];
        $commentReply->body         = $validatedData['replyBody'];
        $commentReply->comment_id   = $validatedData['comment_id'];
        $commentReply->save();

        
        alert()->toast('Komentar balasan berhasil dikirimkan', 'success');
        return redirect()->back();
    }
}
