@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Edit Kategori</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/kategori" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <form method="POST" action="/admin/kategori/{{ $kategori->id }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="kategori" class="form-label">Nama Kategori <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="kategori" id="kategori" value="{{ old('kategori', $kategori->kategori) }}">
                    @error('kategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $kategori->slug) }}">
                    @error('slug')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary m-1 float-end">Update</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Generate Slug Otomatis -->
<script>
    const kategori      = document.querySelector('#kategori');
    const slug          = document.querySelector('#slug');

    kategori.addEventListener('change', function(){
        fetch('/admin/kategori/slug?kategori=' + kategori.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection