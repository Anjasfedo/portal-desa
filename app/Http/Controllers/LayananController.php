<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    public function index()
    {
        return view('layanan.index', [
            'layanans'  => Layanan::orderBy('id', 'DESC')->get()
        ]);
    }
}