<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index', [
            'sliders'   => Slider::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', [
            'slider'    => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'img_slider'    => 'required|mimes:jpeg,jpg,png',
            'link_btn'      => 'required'
        ], [
            'judul.required'        => 'Form judul tidak boleh kosong !',
            'deskripsi.required'    => 'Form deskripsi tidak boleh kosong !',
            'img_slider.required'   => 'Wajib tambahkan gambar untuk slider !',
            'img_slider.mimes'      => 'Gunakan format gambar jpeg, jpg, png !',
            'link_btn.required'     => 'Form url/tautan button tidak boleh kosong !',
        ]);
    
        if($request->hasFile('img_slider')){
            if($slider->img_slider){
                Storage::disk('public')->delete($slider->img_slider);
            }
    
            $path       = 'img-slider/';
            $file       = $request->file('img_slider');
            $extension  = $file->getClientOriginalExtension(); 
            $fileName   = uniqid() . '.' . $extension; 
            $img_slider = $file->storeAs($path, $fileName, 'public');
        } else {
            $validator = Validator::make($request->all(), [
                'judul'         => 'required',
                'deskripsi'     => 'required',
                'img_slider'    => 'nullable|mimes:jpeg,jpg,png',
                'link_btn'      => 'required'
            ], [
                'judul.required'        => 'Form judul tidak boleh kosong !',
                'deskripsi.required'    => 'Form deskripsi tidak boleh kosong !',
                'img_slider.mimes'      => 'Gunakan format gambar jpeg, jpg, png !',
                'link_btn.required'     => 'Form url/tautan button tidak boleh kosong !',
            ]);
            $img_slider = $slider->img_slider;
        }

        if ($validator->fails()) {
            return redirect("/admin/slider/{$slider->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }
    
        $slider->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link_btn'  => $request->link_btn,
            'img_slider'=> $img_slider,
            'user_id'   => auth()->user()->id
        ]);
    
        return redirect('/admin/slider')->with('success', 'Berhasil memperbarui slider');
    }

}
