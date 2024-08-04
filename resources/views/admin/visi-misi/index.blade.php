@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Visi & Misi Desa</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/visi-misi" type="button" class="btn btn-warning float-end" target="_blank">Live Preview</a>
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
                    <div class="col p-5">
                        <h5>Visi & Misi Desa</h5>
                        <div class="visi-misi">
                            <div class="visi mb-3">
                                <p class="fw-bolder">Visi</p>
                                <p>{!! $visiMisi->visi !!}</p>
                            </div>
                            <div class="misi mb-3">
                                <p class="fw-bolder">Misi</p>
                                <p>{!! $visiMisi->misi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="/admin/visi-misi/{{ $visiMisi->id }}/edit" type="button" class="btn btn-warning mb-1 float-end"><i class="ti ti-edit"></i> Edit Visi & Misi</a>
        </div>
      </div>
    </div>
</div>

@endsection