<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil.index', [
            'profil'    => User::first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'email'      => 'required|email:rfc,dns',
        ], [
            'name.required'  => 'Wajib menambahkan nama anda !',
            'email.required' => 'Wajib menambahkan email untu login !',
            'email.email'    => 'Gunakan email yang sah !'
        ]);

        if($request->hasFile('foto')){
            if($user->foto){
                unlink('.' .Storage::url($user->foto));
            }
            $path       = 'img-profil/';
            $file       = $request->file('foto');
            $extension  = $file->getClientOriginalExtension(); 
            $fileName   = uniqid() . '.' . $extension; 
            $foto       = $file->storeAs($path, $fileName, 'public');
        } else {
            $validator = Validator::make($request->all(), [
                'name'       => 'required',
                'email'      => 'required|email:rfc,dns',
            ], [
                'name.required'  => 'Wajib menambahkan nama anda !',
                'email.required' => 'Wajib menambahkan email untu login !',
                'email.email'    => 'Gunakan email yang sah !'
            ]);
            $foto = $user->foto;
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->update([
            'foto'    => $foto,
            'name'    => $request->name,
            'email'   => $request->email,
        ]);

        return redirect('/admin/profil')->with('success', 'Berhasil memperbarui profil');
    }

 
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'passwordNew'      => 'required|same:confirmPassword',
        ], [
            'current_password.required' => 'Masukkan Password saat ini !',
            'passwordNew.required'      => 'Masukkan Password baru !',
            'passwordNew.same'          => 'Password tidak sama'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withOnly(['passwordNew', 'confirmPassword']);
        }

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()
                ->withErrors(['current_password' => 'Password lama salah !'])
                ->withOnly(['passwordNew', 'confirmPassword']);
        } else {
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->passwordNew)
            ]);
            
            Auth::logout();

            return redirect()->route('login') 
                ->with('password-success', 'Berhasil Memperbarui Password. Silakan masuk kembali dengan password baru.');
        }
    }

    
}
