@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Identitas Situs</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/" type="button" class="btn btn-warning float-end me-2" target="_blank">Live Preview</a>
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
                <div class="col-lg-12">
                    <form method="POST" action="/admin/identitas-situs/{{ $situs->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
    
                        <div class="col">
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo Situs <span style="color: red">*</span></label><br>
                                <img src="{{ asset('storage/' . $situs->logo) }}" alt="Logo-preview" style="width: 200px;" class="img-preview py-3" id="preview">
                                <input type="file" class="form-control" name="logo" id="logo"  onchange="previewImage()">
                                <i>Disarankan : 450 x 145 pixel</i>
                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nm_desa" class="form-label">Nama Desa <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="nm_desa" id="nm_desa" value="{{ old('nm_desa', $situs->nm_desa) }}">
                                @error('nm_desa')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $situs->kecamatan) }}">
                                @error('kecamatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">Kabupaten <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="{{ old('kabupaten', $situs->kabupaten) }}">
                                @error('kabupaten')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="provinsi" id="provinsi" value="{{ old('provinsi', $situs->provinsi) }}">
                                @error('provinsi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_pos" class="form-label">Kode Pos <span style="color: red">*</span></label>
                                <input type="number" class="form-control" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', $situs->kode_pos) }}">
                                @error('kode_pos')
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

<!-- Preview Image -->
<script>
    function previewImage(){
        var preview     = document.getElementById('preview');
        var fileInput   = document.getElementById('logo');
        var file        = fileInput.files[0];
        var reader      = new FileReader();

        reader.onload = function(e){
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection