@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit Layanan</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/layanan" type="button" class="btn btn-warning float-end">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/layanan/{{ $layanan->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <label for="layanan" class="form-label">Nama Layanan <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="layanan" id="layanan"
                                value="{{ old('layanan', $layanan->layanan) }}">
                            @error('layanan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="persyaratan" class="form-label">Persyaratan<span style="color: red">*</span></label>
                            <textarea class="form-control" id="editor" name="persyaratan" rows="10">{{ old('persyaratan', $layanan->persyaratan) }}</textarea>
                            @error('persyaratan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary m-1 float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
