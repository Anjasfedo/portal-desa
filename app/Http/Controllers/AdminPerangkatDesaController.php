<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerangkatDesa;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminPerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perangkat-desa.index', [
            'perangkatDesas'    => PerangkatDesa::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perangkat-desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'jabatan'   => 'required',
            'foto'      => 'required|mimes:jpeg,jpg,png',
        ], [

            'nama.required'     => 'Wajib menambahkan nama perangkat desa !',
            'jabatan.required'  => 'Wajib menambahkan jabatan perangkat desa !',
            'foto.required'     => 'Wajib menambahkan foto perangkat desa !',
            'foto.mimes'        => 'Format gambar yang di izinkan Jpeg, Jpg, Png',
        ]);

        if($request->hasFile('foto')){
            $path       = 'img-perangkat/';
            $file       = $request->file('foto');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid(). '.' . $extension;
            $foto       = $file->storeAs($path, $fileName, 'public');
        } else {
            $foto       = null;
        }

        if($validator->fails()){
            return redirect('/admin/perangkat-desa/create')
                ->withErrors($validator)
                ->withInput();
        }

        $perangkatDesa = PerangkatDesa::create([
            'nama'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'foto'      => $path . $fileName,
            'user_id'   => auth()->user()->id
        ]);

        return redirect('/admin/perangkat-desa')->with('success', 'Berhasil menambahkan data perangkat desa');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerangkatDesa $perangkatDesa)
    {
        return view('admin.perangkat-desa.edit', [
            'perangkatDesa'     => $perangkatDesa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerangkatDesa $perangkatDesa)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'jabatan'   => 'required',
        ], [

            'nama.required'     => 'Wajib menambahkan nama perangkat desa !',
            'jabatan.required'  => 'Wajib menambahkan jabatan perangkat desa !',
        ]);

        if($request->hasFile('foto')){
            if($perangkatDesa->foto){
                unlink('.' .Storage::url($perangkatDesa->foto));
            }
            $path       = 'img-perangkat/';
            $file       = $request->file('foto');
            $extension  = $file->getClientOriginalExtension(); 
            $fileName   = uniqid() . '.' . $extension; 
            $foto       = $file->storeAs($path, $fileName, 'public');
        } else {
            $validator = Validator::make($request->all(), [
                'nama'      => 'required',
                'jabatan'   => 'required',
            ], [
    
                'nama.required'     => 'Wajib menambahkan nama perangkat desa !',
                'jabatan.required'  => 'Wajib menambahkan jabatan perangkat desa !',
            ]);
            $foto = $perangkatDesa->foto;
        }

        if ($validator->fails()) {
            return redirect("/admin/perangkat-desa/{$perangkatDesa->id}/edit")
                ->withErrors($validator)
                ->withInput();
        };

        $perangkatDesa->update([
            'nama'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'foto'      => $foto,
            'user_id'   => auth()->user()->id
        ]);

        return redirect('/admin/perangkat-desa')->with('success', 'Berhasil memperbarui data perangkat desa');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerangkatDesa $perangkatDesa)
    {
        unlink('.'.Storage::url($perangkatDesa->foto));
        $perangkatDesa->delete();

        return redirect('/admin/perangkat-desa')->with('success', 'Berhasil menghapus data perangkat desa');
    }
}
