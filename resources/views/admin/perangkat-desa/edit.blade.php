@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Edit Perangkat Desa</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/perangkat-desa" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <form method="POST" action="/admin/perangkat-desa/{{ $perangkatDesa->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">nama <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $perangkatDesa->nama) }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">jabatan <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ old('jabatan', $perangkatDesa->jabatan) }}">
                            @error('jabatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
               <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ asset('storage/' .$perangkatDesa->foto) }}" class="img-preview img-fluid mb-3 mt-2" id="preview" style="border-radius: 5px; max-height:300px; overflow:hidden;"><br>
                            <label for="foto" class="form-label">Foto Perangkat Desa <span style="color: red">*</span></label>
                            <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                            @error('foto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <button type="submit" class="btn btn-primary m-1 float-end">Simpan</button>
                    </div>
               </div>
            </div>
        </div>
    </form>
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