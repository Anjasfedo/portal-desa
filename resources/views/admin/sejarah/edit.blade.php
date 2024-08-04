@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Gambar Slider</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/sejarah" type="button" class="btn btn-warning float-end" target="_blank">Live Preview</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
               <form method="POST" action="/admin/sejarah/{{ $sejarah->id }}">
                    @method('put')
                    @csrf

                    <div class="col">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $sejarah->judul) }}">
                            @error('judul')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Deskripsi <span style="color: red">*</span></label>
                            <textarea class="form-control" id="editor" name="body" rows="10">{{ old('body', $sejarah->body) }}</textarea>
                            @error('body')
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