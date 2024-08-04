<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pekerjaan.index', [
            'pekerjaans'    => Pekerjaan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pekerjaan' => 'required',
            'jumlah'    => 'required|nume ric'
        ], [
            'pekerjaan.required'  => 'Form pekerjaan tidak boleh kosong !',
            'jumlah'              => 'Form jumlah jumlah tidak boleh kosong !',
            'jumlah.numeric'      => 'Format yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/pekerjaan/create')
                ->withErrors($validator)
                ->withInput();
        }

        Pekerjaan::create([
            'pekerjaan'  => $request->pekerjaan,
            'jumlah'     => $request->jumlah,
            'user_id'    => auth()->user()->id
        ]);
        
        return redirect('/admin/pekerjaan')->with('success', 'Berhasil menambahkan data pekerjaan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('admin.pekerjaan.edit', [
            'pekerjaan'  => $pekerjaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $validator = Validator::make($request->all(), [
            'pekerjaan' => 'required',
            'jumlah'    => 'required|nume ric'
        ], [
            'pekerjaan.required'  => 'Form pekerjaan tidak boleh kosong !',
            'jumlah'              => 'Form jumlah jumlah tidak boleh kosong !',
            'jumlah.numeric'      => 'Format yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/pekerjaan/' . $pekerjaan->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $pekerjaan->update([
            'pekerjaan'  => $request->pekerjaan,
            'jumlah'    => $request->jumlah,
        ]);

        return redirect('/admin/pekerjaan')->with('success', 'Berhasil mengedit data pekerjaan !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->delete();
        return redirect('/admin/pekerjaan')->with('success', 'Berhasil menghapus data pekerjaan !');
    }
}
