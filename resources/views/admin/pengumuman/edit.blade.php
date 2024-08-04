@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit Pengumuman</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/pengumuman" type="button" class="btn btn-warning float-end">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form method="POST" action="/admin/pengumuman/{{ $announcement->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Pengumuman<span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="judul" id="judul"
                                            value="{{ old('judul', $announcement->judul) }}">
                                        @error('judul')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug/Permalink <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            value="{{ old('slug', $announcement->slug) }} ">
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="isi_pengumuman" class="form-label">Isi pengumuman <span
                                                style="color: red">*</span></label>
                                        <textarea class="form-control" id="editor" name="isi_pengumuman" rows="10">{{ old('isi_pengumuman', $announcement->isi_pengumuman) }}</textarea>
                                        @error('isi_pengumuman')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
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
