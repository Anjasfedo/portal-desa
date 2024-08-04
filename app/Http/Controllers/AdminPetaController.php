<?php

namespace App\Http\Controllers;

use App\Models\Peta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPetaController extends Controller
{
    public function index()
    {
        return view('admin.peta-desa.index', [
            'petaDesa'     => Peta::first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $petaDesa = Peta::find($id);
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'alamat'    => 'required'
        ], [
            'judul.required'   => 'Form judul tidak boleh kosong !',
            'alamat.required'  => 'Form alamat wajib di isi !'
        ]);

        if($validator->fails()){
            return redirect("/admin/peta/{$petaDesa->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $petaDesa->update([
            'judul'     => $request->judul,
            'alamat'    => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui peta desa');
    }
}
