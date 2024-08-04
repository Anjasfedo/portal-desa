<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::first();
        return view('sejarah.index', [
            'sejarah'   => $sejarah
        ]);
    }
}
