<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kategori.index', [
            'kategories'    => Kategori::with('user')
                ->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori'  => 'required',
            'slug'      => 'required|unique:kategoris'
        ], [
            'kategori.required' => 'Kategori wajib di isi !',
            'slug.required'     => 'Wajib ada slug !',
            'slug.unique'       => 'Slug sudah digunakan !'
        ]);

        if($validator->fails()){
            return redirect('/admin/kategori/create')
                ->withErrors($validator)
                ->withInput();
        }

        Kategori::create([
            'kategori'  => $request->kategori,
            'slug'      => $request->slug,
            'user_id'   => auth()->user()->id
        ]);
        
        return redirect('/admin/kategori')->with('success', 'Berhasil menambahkan data kategori');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', [
            'kategori'  => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'kategori'  => 'required',
            'slug'      => 'required',
        ], [
            'kategori.required' => 'Kategori wajib di isi !',
            'slug.required'     => 'Wajib menambahkan slug !',
        ]);

        if($request->slug != $kategori->slug){
            $kategori->slug  = 'required|unique:kategoris';
        }

        if($validator->fails()){
            return redirect('/admin/kategori' . $kategori->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $kategori->update([
            'kategori'  => $request->kategori,
            'slug'      => $request->slug,
        ]);

        return redirect('/admin/kategori')->with('success', 'Berhasil mengedit data kategori !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('/admin/kategori')->with('success', 'Berhasil menghapus data kategori !');
    }

    /**
     * Generate slug / permalink by kategori.
     */
    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->kategori);
        return response()->json(['slug' => $slug]);
    }
}
