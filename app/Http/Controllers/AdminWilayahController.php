<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminWilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::first();
        return view('admin.wilayah.index', [
            'wilayah'   => $wilayah,
        ]);
    }

    public function edit($id)
    {
        $wilayah = Wilayah::find($id);
        return view('admin.wilayah.edit', [
            'wilayah'   => $wilayah
        ]);
    }

    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::find($id);
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'body'      => 'required'
        ], [
            'judul.required'   => 'Form judul tidak boleh kosong !',
            'body.required'    => 'Deskripsi wilayah desa wajib di isi !'
        ]);

        if ($validator->fails()) {
            return redirect("/admin/wilayah/{$wilayah->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $wilayah->update([
            'judul'     => $request->judul,
            'body'      => $request->body,
        ]);

        return redirect('/admin/wilayah')->with('success', 'Berhasil memperbarui data wilayah desa');
    }


}
