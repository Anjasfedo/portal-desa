<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminVisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::first();
        return view('admin.visi-misi.index', [
            'visiMisi'  => $visiMisi
        ]);
    }

    public function edit($id)
    {
        $visiMisi = VisiMisi::find($id);
        return view('admin.visi-misi.edit', [
            'visiMisi'  => $visiMisi
        ]);
    }

    public function update(Request $request, $id)
    {
        $visiMisi  = VisiMisi::find($id);
        $validator = Validator::make($request->all(), [
            'visi'      => 'required',
            'misi'      => 'required'
        ], [
            'visi.required'    => 'Masukkan visi desa !',
            'misi.required'    => 'Masukkan Misi desa!'
        ]);

        if($validator->fails()){
            return redirect("/admin/visi-misi/{$visiMisi->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $visiMisi->update([
            'visi'  => $request->visi,
            'misi'  => $request->misi
        ]);

        return redirect('/admin/visi-misi')->with('success', 'Berhasil visi & misi desa');
    }
}
