<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.umkm.index', [
            'umkms'  => Umkm::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto'      => 'required|mimes:jpeg,jpg,png',
            'produk'    => 'required',
            'slug'      => 'required|unique:umkms',
            'harga'     => 'required|numeric',
            'no_hp'     => 'required|numeric',
            'deskripsi' => 'required'
        ], [
            'foto.required'         => 'Wajib menambahkan foto !',
            'foto.mimes'            => 'Format foto yang di izinkan Jpeg, Jpg, Png',
            'produk.required'       => 'Wajib menambahkan nama produk !',
            'slug.required'         => 'Slug tidak boleh kosong !',
            'slug.unique'           => 'Slug tidak boleh sama !',
            'harga.required'        => 'Wajib menambahkan harga !',
            'harga.numeric'         => 'Tambahkan format angka !',
            'no_hp.required'        => 'Wajib menambahkan No Hp !',
            'no_hp.numeric'         => 'Tambahkan format angka !',
            'deskripsi.required'    => 'Wajib menambahkan deskripsi produk !'
        ]);

        if ($request->hasFile('foto')) {
            $path       = 'img-produk/';
            $file       = $request->file('foto');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $foto     = $file->storeAs($path, $fileName, 'public');
        } else {
            $foto     = null;
        }

        if ($validator->fails()) {
            return redirect('/admin/umkm/create')
                ->withErrors($validator)
                ->withInput();
        }

        Umkm::create([
            'foto'          =>  $path . $fileName,
            'produk'        =>  $request->produk,
            'slug'          =>  $request->slug,
            'harga'         =>  $request->harga,
            'no_hp'         =>  $request->no_hp,
            'deskripsi'     =>  $request->deskripsi,
            'user_id'       =>  auth()->user()->id,
        ]);

        return redirect('/admin/umkm')->with('success', 'Berhasil menambahkan data produk umkm');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $umkm = Umkm::find($id);
        return view('admin.umkm.edit', [
            'umkm'  => $umkm
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $umkm = Umkm::find($id);
        $validator = Validator::make($request->all(), [
            'produk'    => 'required',
            'slug'      => 'required',
            'harga'     => 'required|numeric',
            'no_hp'     => 'required|numeric',
            'deskripsi' => 'required'
        ], [
            'produk.required'       => 'Wajib menambahkan nama produk !',
            'slug.required'         => 'Slug tidak boleh kosong !',
            'harga.required'        => 'Wajib menambahkan harga !',
            'harga.numeric'         => 'Tambahkan format angka !',
            'no_hp.required'        => 'Wajib menambahkan No Hp !',
            'no_hp.numeric'         => 'Tambahkan format angka !',
            'deskripsi.required'    => 'Wajib menambahkan deskripsi produk !'
        ]);

        if ($request->slug != $umkm->slug) {
            $umkm->slug  = 'required|unique:umkms';
        }

        if ($request->hasFile('foto')) {
            if ($umkm->foto) {
                unlink('.' . Storage::url($umkm->foto));
            }
            $path       = 'img-produk/';
            $file       = $request->file('foto');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $foto     = $file->storeAs($path, $fileName, 'public');
        } else {
            $validator = Validator::make($request->all(), [
                'produk'    => 'required',
                'slug'      => 'required',
                'harga'     => 'required|numeric',
                'no_hp'     => 'required|numeric',
                'deskripsi' => 'required'
            ], [
                'produk.required'       => 'Wajib menambahkan nama produk !',
                'slug.required'         => 'Slug tidak boleh kosong !',
                'harga.required'        => 'Wajib menambahkan harga !',
                'harga.numeric'         => 'Tambahkan format angka !',
                'no_hp.required'        => 'Wajib menambahkan No Hp !',
                'no_hp.numeric'         => 'Tambahkan format angka !',
                'deskripsi.required'    => 'Wajib menambahkan deskripsi produk !'
            ]);
            $foto = $umkm->foto;
        }
        if ($validator->fails()) {
            return redirect("/admin/umkm/{$umkm->id}/edit")
                ->withErrors($validator)
                ->withInput();
        };

        $umkm->update([
            'foto'          => $foto,
            'produk'        => $request->produk,
            'slug'          => $request->slug,
            'harga'         => $request->harga,
            'no_hp'         => $request->no_hp,
            'deskripsi'     => $request->deskripsi,
            'excerpt'       => Str::limit(strip_tags($request->body), 100),
            'user_id'       => auth()->user()->id,
        ]);

        return redirect('/admin/umkm')->with('success', 'Berhasil memperbarui produk umkm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $umkm = Umkm::find($id);
        unlink('.' . Storage::url($umkm->foto));
        $umkm->delete();

        return redirect('/admin/umkm')->with('success', 'Berhasil menghapus produk umkm');
    }

    /**
     * Generate slug / permalink by Produk.
     */
    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Umkm::class, 'slug', $request->produk);
        return response()->json(['slug' => $slug]);
    }
}
