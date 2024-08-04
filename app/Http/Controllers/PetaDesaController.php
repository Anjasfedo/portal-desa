<?php

namespace App\Http\Controllers;

use App\Models\Peta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetaDesaController extends Controller
{
    public function index()
    {
        return view('peta-desa.index', [
            'petaDesa'     => Peta::first()
        ]);
    }
}
