<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminAgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.agama.index', [
            'agamas'    => Agama::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agama = Agama::find($id);
        return view('admin.agama.edit', [
            'agama' => $agama
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agama = Agama::find($id);
        $validator = Validator::make($request->all(), [
            'agama'     => 'required',
            'penganut'  => 'required|numeric'
        ], [
            'agama.required'    => 'Form Agama tidak boleh kosong !',
            'penganut'          => 'Form jumlah penganut tidak boleh kosong !',
            'penganut.numeric'  => 'Format yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/agama/' . $agama->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $agama->update([
            'agama'     => $request->agama,
            'penganut'  => $request->penganut,
        ]);

        return redirect('/admin/agama')->with('success', 'Berhasil mengedit data agama !');
    }

}
