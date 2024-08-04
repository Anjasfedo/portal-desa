@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Edit Data Jenis Kelamin</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/jenis-kelamin" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <form method="POST" action="/admin/jenis-kelamin/{{ $jenisKelamin->id }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin', $jenisKelamin->jenis_kelamin) }}">
                    @error('jenis_kelamin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah<span style="color: red">*</span></label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ old('jumlah', $jenisKelamin->jumlah) }}">
                    @error('jumlah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary m-1 float-end">Simpan</button>
            </form>
        </div>
      </div>
    </div>
</div>

@endsection