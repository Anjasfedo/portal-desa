<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminSejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::first();
        return view('admin.sejarah.index', [
            'sejarah'   => $sejarah
        ]);
    }

    public function edit($id)
    {
        $sejarah = Sejarah::find($id);
        return view('admin.sejarah.edit', [
            'sejarah'   => $sejarah
        ]);
    }

    public function update(Request $request, $id)
    {   
        $sejarah = Sejarah::find($id);
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'body'      => 'required'
        ], [
            'judul.required'   => 'Form judul tidak boleh kosong !',
            'body.required'    => 'Deskripsi wilayah desa wajib di isi !'
        ]);

        if($validator->fails()){
            return redirect("/admin/sejarah/{$sejarah->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $sejarah->update([
            'judul'     => $request->judul,
            'body'      => $request->body,
        ]);

        return redirect('/admin/sejarah')->with('success', 'Berhasil memperbarui data sejarah desa');
    }
}
