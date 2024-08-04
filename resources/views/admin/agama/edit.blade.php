@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Edit Data Agama</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/agama" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <form method="POST" action="/admin/agama/{{ $agama->id }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="agama" class="form-label">Nama Agama <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="agama" id="agama" value="{{ old('agama', $agama->agama) }}">
                    @error('agama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="penganut" class="form-label">Jumlah Penganut <span style="color: red">*</span></label>
                    <input type="number" class="form-control" name="penganut" id="penganut" value="{{ old('penganut', $agama->penganut) }}">
                    @error('penganut')
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