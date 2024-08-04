<?php

namespace App\Http\Controllers;

use App\Models\Situs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminIdentitasSitusController extends Controller
{
    public function index()
    {
        return view('admin.identitas-situs.index', [
            'situs' => Situs::first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $situs = Situs::find($id);
        $validator = Validator::make($request->all(), [
            'nm_desa'       => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'kode_pos'      => 'required',
        ], [
            'nm_desa'       => 'Wajib menambahkan nama desa !',
            'kecamatan'     => 'Wajib menambahkan kecamatan !',
            'kabupaten'     => 'Wajib menambahkan kabupaten !',
            'kode_pos'      => 'Wajib menambahkan kode pos !'
        ]);

        if($request->hasFile('logo')){
            if($situs->logo){
                unlink('.' .Storage::url($situs->logo));
            }
            $path       = 'img-logo/';
            $file       = $request->file('logo');
            $extension  = $file->getClientOriginalExtension(); 
            $fileName   = uniqid() . '.' . $extension; 
            $logo       = $file->storeAs($path, $fileName, 'public');
        } else {
            $validator = Validator::make($request->all(), [
                'nm_desa'       => 'required',
                'kecamatan'     => 'required',
                'kabupaten'     => 'required',
                'provinsi'      => 'required',
                'kode_pos'      => 'required',
            ], [
                'nm_desa'       => 'Wajib menambahkan nama desa !',
                'kecamatan'     => 'Wajib menambahkan kecamatan !',
                'kabupaten'     => 'Wajib menambahkan kabupaten !',
                'provinsi'      => 'Wajib menambahkan provinsi !',
                'kode_pos'      => 'Wajib menambahkan kode pos !'
            ]);
            $logo = $situs->logo;
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $situs->update([
            'logo'       => $logo,
            'nm_desa'    => $request->nm_desa,
            'kecamatan'  => $request->kecamatan,
            'kabupaten'  => $request->kabupaten,
            'provinsi'   => $request->provinsi,
            'kode_pos'   => $request->kode_pos,
        ]);

        return redirect('/admin/identitas-situs')->with('success', 'Berhasil memperbarui identitas situs');
    }
}
