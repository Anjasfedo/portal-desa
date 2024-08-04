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
                    <a href="/wilayah" type="button" class="btn btn-warning float-end" target="_blank">Live Preview</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col p-5">
                    <h5>{{ $wilayah->judul }}</h5>
                    <p>
                        {!! $wilayah->body !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="/admin/wilayah/{{ $wilayah->id }}/edit" type="button" class="btn btn-warning mb-1 float-end"><i class="ti ti-edit"></i> Edit Sejarah</a>
        </div>
      </div>
    </div>
</div>

@endsection