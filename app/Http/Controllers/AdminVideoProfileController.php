<?php

namespace App\Http\Controllers;

use App\Models\VideoProfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminVideoProfileController extends Controller
{
    public function index()
    {
        return view('admin.video-profile.index', [
            'videoProfile'  => VideoProfil::first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $videoProfile = VideoProfil::find($id);
        $validator = Validator::make($request->all(), [
            'url_video'   => 'required',
        ], [
            'url_video'   => 'Wajib menambahkan url video !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $videoProfile->update([
            'url_video'     => $request->url_video
        ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui link video profile desa');
    }
}
