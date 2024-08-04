@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Tambah Produk UMKM</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/umkm" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <form method="POST" action="/admin/umkm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="produk" class="form-label">Produk <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="produk" id="produk" value="{{ old('produk') }}">
                            @error('produk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug/Permalink <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga <span style="color: red">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp. </span>
                                <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga') }}">
                            </div>
                            @error('harga')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp Penjual <span style="color: red">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">+62</span>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="81229248179">
                            </div>
                            @error('no_hp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Produk <span style="color: red">*</span></label>
                            <textarea class="form-control" id="editor" name="deskripsi" rows="10">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
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
                            <img src="" class="img-preview img-fluid mb-3 mt-2" id="preview" style="border-radius: 5px; max-height:300px; overflow:hidden;"><br>
                            <label for="foto" class="form-label">Foto Produk <span style="color: red">*</span></label>
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

<!-- Generate Slug Otomatis -->
<script>
    const produk     = document.querySelector('#produk');
    const slug      = document.querySelector('#slug');

    produk.addEventListener('change', function(){
        fetch('/admin/umkm/slug?produk=' + produk.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>

<!-- Preview Image -->
<script>
    function previewImage(){
        preview.src=URL.createObjectURL(event.target.files[0]);
    }
</script>

<!-- Ck Editor 5 -->
<script>
    let editorInstance;
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
             editorInstance =editor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection