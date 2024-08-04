<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class kategoriController extends Controller
{
    public function index(Kategori $kategori)
    {
        return view('kategori.index', [
            'kategori'  => $kategori->kategori,
            'beritas'   => $kategori->beritas()->orderBy('created_at')->paginate(9)
        ]);
    }
}
