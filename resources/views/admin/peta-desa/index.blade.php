@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Peta Desa</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/peta-desa" type="button" class="btn btn-warning float-end me-2" target="_blank">Live Preview</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8">
                    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q={{ urlencode($petaDesa->alamat) }}&amp;t=h&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
                <div class="col-lg-4">
                    <form method="POST" action="/admin/peta-desa/{{ $petaDesa->id }}">
                        @method('put')
                        @csrf
    
                        <div class="col">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $petaDesa->judul) }}">
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', $petaDesa->alamat) }}">
                                <i><small>Contoh : Karangmulyo, Purwodadi, Purworejo</small></i>
                                @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
                        <button type="submit" class="btn btn-primary m-1 float-end">Update</button>
                   </form>
                </div>
            </div>
              
        </div>

      </div>
    </div>
</div>
@endsection