<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.layanan.index', [
            'layanans'  => Layanan::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'layanan'       => 'required',
            'persyaratan'   => 'required'
        ], [
            'layanan.required'  => 'Form wajib di isi !',
            'persyaratan.required' => 'Form wajib di,'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Layanan::create([
            'layanan'       => $request->layanan,
            'persyaratan'   => $request->persyaratan,
            'user_id'       =>  auth()->user()->id,
        ]);

        return redirect('/admin/layanan')->with('success', 'Berhasil menambahkan informasi layanan baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = Layanan::find($id);
        return view('admin.layanan.edit', [
            'layanan' => $layanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::find($id);
        $validator = Validator::make($request->all(), [
            'layanan'       => 'required',
            'persyaratan'   => 'required'
        ], [
            'layanan.required'  => 'Form wajib di isi !',
            'persyaratan.required' => 'Form wajib di,'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $layanan->update([
            'layanan'       => $request->layanan,
            'persyaratan'   => $request->persyaratan
        ]);

        return redirect('/admin/layanan')->with('success', 'Berhasil memperbarui data informasi layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = Layanan::find($id);
        $layanan->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}