@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Tambah Berita</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/berita" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <form method="POST" action="/admin/berita" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul') }}">
                            @error('judul')
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
                            <label for="body" class="form-label">Isi Berita <span style="color: red">*</span></label>
                            <textarea class="form-control" id="editor" name="body" rows="10">{{ old('body') }}</textarea>
                            @error('body')
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
                            <label for="gambar" class="form-label">Gambar Slider <span style="color: red">*</span></label>
                            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImage()">
                            @error('gambar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Berita <span style="color: red">*</span></label>
                            <select class="form-control" name="kategori_id" id="kategori_id">
                                <option value=""> -- Pilih Kategori -- </option>
                                @foreach ($kategories as $kategori)
                                    @if (old('kategori_id') == $kategori->id)
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Berita <span style="color: red">*</span></label>
                            <select class="form-control" name="status_id" id="status_id">
                                <option value=""> -- Pilih Status -- </option>
                                @foreach ($postStatus as $status)
                                    @if (old('status_id') == $status->id)
                                        <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                                    @else
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('status_id')
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
    const judul     = document.querySelector('#judul');
    const slug      = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/admin/berita/slug?judul=' + judul.value)
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