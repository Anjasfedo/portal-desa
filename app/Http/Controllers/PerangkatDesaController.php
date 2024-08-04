<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkatDesa = PerangkatDesa::all();
        return view('perangkat-desa.index', [
            'perangkatDesa' => $perangkatDesa
        ]);
    }
}
