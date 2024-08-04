<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index', [
            'kontak'   => Kontak::first()
        ]);
    }
}
