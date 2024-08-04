<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminJenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.jenis-kelamin.index', [
            'jenisKelamins'     => JenisKelamin::all()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisKelamin = JenisKelamin::find($id);
        return view('admin.jenis-kelamin.edit', [
            'jenisKelamin'  => $jenisKelamin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenisKelamin = JenisKelamin::find($id);
        $validator = Validator::make($request->all(), [
            'jenis_kelamin'     => 'required',
            'jumlah'            => 'required|numeric'
        ], [
            'jenis_kelamin.required' => 'Form jenis kelamin tidak boleh kosong !',
            'jumlah.required'        => 'Form jumlah tidak boleh kosong !',
            'jumlah.numeric'         => 'Format yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/jenis-kelamin/' . $jenisKelamin->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $jenisKelamin->update([
            'jenis_kelamin'   => $request->jenis_kelamin,
            'jumlah'          => $request->jumlah,
        ]);

        return redirect('/admin/jenis-kelamin')->with('success', 'Berhasil mengedit data jenis kelamin !');
    }
}
