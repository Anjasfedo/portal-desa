<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        return view('berita.index', [
            'beritas'   => Berita::where('status_id', 2)->with(['user', 'status'])
                ->orderBy('id', 'DESC')->paginate(9),
        ]);
    }

    public function berita($slug)
    {
        $berita = Berita::where('slug', $slug)->with(['user', 'status', 'kategori', 'comments'])->first();
        $berita->views += 1;
        $berita->save();

        return view('berita.detail', [
            'berita'        => $berita,
            'beritaPopuler' => Berita::where('status_id', 2)->orderBy('views', 'desc')->take(5)->get(),
            'kategories'    => Kategori::all(),
        ]);
    }

    
}
