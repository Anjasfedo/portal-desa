@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Profil</h5>
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
                <div class="col-lg-4">
                    <div class="card">
                        <img src="{{ asset('storage/'. $profil->foto) }}" alt="Foto Profil" class="rounded img-preview py-3" id="preview">
                    </div>
                </div>
                <div class="col-lg-8">
                    <form method="POST" action="/admin/profil/{{ $profil->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
    
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Profil <span style="color: red">*</span></label><br>
                            <input type="file" class="form-control" name="foto" id="foto"  onchange="previewImage()">
                            @error('foto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Admin <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $profil->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Admin <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $profil->email) }}">
                                @error('email')
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

<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Perbarui Password</h5>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="/admin/profil/">
                        @method('put')
                        @csrf
    
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Masukkan Password Lama <span style="color: red">*</span></label>
                            <input type="password" class="form-control" name="current_password" id="current_password">
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordNew" class="form-label">Masukkan Password Baru <span style="color: red">*</span></label>
                            <input type="password" class="form-control" name="passwordNew" id="passwordNew">
                            @error('passwordNew')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Konfirmasi Password <span style="color: red">*</span></label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
                            @error('confirmPassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
    
                        <button type="submit" class="btn btn-primary m-1 float-end">Update</button>
                   </form>
                </div>
            </div>
              
        </div>

      </div>
    </div>
</div>

<!-- Preview Image -->
<script>
    function previewImage(){
        var preview     = document.getElementById('preview');
        var fileInput   = document.getElementById('foto');
        var file        = fileInput.files[0];
        var reader      = new FileReader();

        reader.onload = function(e){
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection