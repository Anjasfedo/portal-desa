<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UmkmController extends Controller
{
    public function index()
    {
        return view('umkm.index', [
            'umkms'     => Umkm::orderBy('id', 'DESC')->paginate(9)
        ]);
    }

    public function detail($slug)
    {
        $umkm   = Umkm::where('slug', $slug)->first();
        return view('umkm.detail', [
            'umkm'  => $umkm
        ]);
    }
}
