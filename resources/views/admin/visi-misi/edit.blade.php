@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Edit Visi & Misi</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/visi-misi" type="button" class="btn btn-warning float-end" target="_blank">Live Preview</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
               <form method="POST" action="/admin/visi-misi/{{ $visiMisi->id }}">
                    @method('put')
                    @csrf

                    <div class="col">
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi <span style="color: red">*</span></label>
                            <textarea class="form-control" id="visi" name="visi" rows="5">{{ old('visi', $visiMisi->visi) }}</textarea>
                            @error('visi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label">Deskripsi <span style="color: red">*</span></label>
                            <textarea class="form-control" id="visi" name="misi" rows="5">{{ old('misi', $visiMisi->misi) }}</textarea>
                            @error('misi')
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


@endsection