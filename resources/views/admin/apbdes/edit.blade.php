@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit Anggaran (APBDES)</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/apbdes" type="button" class="btn btn-warning float-end">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="/admin/apbdes/{{ $anggaran->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="judul" id="judul"
                                    value="{{ old('judul', $anggaran->judul) }}">
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug/Permalink <span
                                        style="color: red">*</span></label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ old('slug', $anggaran->slug) }}">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan <span
                                        style="color: red">*</span></label>
                                <textarea class="form-control" id="editor" name="keterangan" rows="10">{{ old('keterangan', $anggaran->keterangan) }}</textarea>
                                @error('keterangan')
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
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $anggaran->gambar) }}"
                                        class="img-preview img-fluid mb-3 mt-2" id="preview"
                                        style="border-radius: 5px; max-height:300px; overflow:hidden;"><br>
                                    <label for="gambar" class="form-label">Gambar Anggaran <span
                                            style="color: red">*</span></label>
                                    <input class="form-control" type="file" id="gambar" name="gambar"
                                        onchange="previewImage()">
                                    @error('gambar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <!-- Generate Slug Otomatis -->
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/admin/pengumuman/slug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

    <!-- Preview Image -->
    <script>
        function previewImage() {
            var preview = document.getElementById('preview');
            var fileInput = document.getElementById('gambar');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>

    <!-- Ck Editor 5 -->
    <script>
        let editorInstance;
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
