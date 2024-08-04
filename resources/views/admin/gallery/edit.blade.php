@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit Gallery</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/gallery" type="button" class="btn btn-warning float-end">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/gallery/{{ $gallery->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $gallery->gambar) }}"
                                    class="img-preview img-fluid mb-3 mt-2" id="preview"
                                    style="border-radius: 5px; max-height:300px; overflow:hidden;"><br>
                                <label for="gambar" class="form-label">gambar Produk <span
                                        style="color: red">*</span></label>
                                <input class="form-control" type="file" id="gambar" name="gambar"
                                    onchange="previewImage()">
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan"
                                value="{{ old('keterangan', $gallery->keterangan) }}">
                            @error('keterangan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary m-1 float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
@endsection
