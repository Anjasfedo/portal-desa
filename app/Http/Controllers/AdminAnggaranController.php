<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Anggaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.apbdes.index', [
            'anggarans'     => Anggaran::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.apbdes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'         => 'required',
            'slug'          => 'required|unique:anggarans',
            'keterangan'    => 'required',
            'gambar'        => 'required|mimes:jpg,png,jpeg'
        ], [
            'judul.required'        => "Form wajib di isi !",
            'slug.required'         => 'Slug tidak boleh kosong !',
            'slug.unique'           => 'Slug tidak boleh sama !',
            'gambar.required'       => 'Form wajib di isi !',
            'gambar.mimes'          => 'Format yang di izinkan png,jpg,jpeg !',
            'keterangan.required'   => 'Form wajib di,'
        ]);

        if ($request->hasFile('gambar')) {
            $path       = 'img-anggaran/';
            $file       = $request->file('gambar');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $gambar     = $file->storeAs($path, $fileName, 'public');
        } else {
            $gambar     = null;
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Anggaran::create([
            'judul'         => $request->judul,
            'slug'          => $request->slug,
            'keterangan'    => $request->keterangan,
            'gambar'        => $gambar,
            'user_id'       => auth()->user()->id
        ]);
        return redirect('/admin/apbdes')->with('success', 'Berhasil menambahkan data baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggaran = Anggaran::find($id);
        return view('admin.apbdes.edit', [
            'anggaran'  => $anggaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anggaran = Anggaran::find($id);
        $validator = Validator::make($request->all(), [
            'judul'         => 'required',
            'slug'          => 'required',
            'keterangan'    => 'required',
            'gambar'        => 'required|mimes:jpg,png,jpeg'
        ], [
            'judul.required'        => "Form wajib di isi !",
            'slug.required'         => 'Slug tidak boleh kosong !',
            'gambar.required'       => 'Form wajib di isi !',
            'gambar.mimes'          => 'Format yang di izinkan png,jpg,jpeg !',
            'keterangan.required'   => 'Form wajib di,'
        ]);

        if ($request->hasFile('gambar')) {
            if ($anggaran->gambar) {
                unlink('.' . Storage::url($anggaran->gambar));
            }
            $path       = 'img-anggaran/';
            $file       = $request->file('gambar');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $gambar     = $file->storeAs($path, $fileName, 'public');
        } else {
            $validator = Validator::make($request->all(), [
                'judul'        => 'required',
                'gambar'       => 'mimes:png,jpg,jpeg',
                'keterangan'   => 'required'
            ], [
                'judul.required'        => 'Form wajib di isi !',
                'gambar.mimes'          => 'Format yang di izinkan png,jpg,jpeg !',
                'keterangan.required'   => 'Form wajib di isi !'
            ]);
            $gambar = $anggaran->gambar;
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $anggaran->update([
            'judul'         => $request->judul,
            'gambar'        => $gambar,
            'keterangan'    => $request->keterangan
        ]);

        return redirect('/admin/apbdes')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggaran = Anggaran::find($id);
        unlink('.' . Storage::url($anggaran->gambar));
        $anggaran->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data !');
    }

    /**
     * Generate slug / permalink by Judul.
     */
    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
