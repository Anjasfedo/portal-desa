@extends('admin.layouts.main')

@section('content')

  
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Perangkat Desa</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/perangkat-desa" type="button" class="btn btn-warning float-end me-2" target="_blank">Live Preview</a>
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
                <div class="button">
                    <a href="/admin/perangkat-desa/create" type="button" class="btn btn-success my-3">Tambah Perangkat Desa</a>
                </div>

                @foreach ($perangkatDesas as $perangkat)
                  <div class="col-xl-3 my-3" data-aos="fade-up">
                    <div class="member">
                      <div class="pic"><img src="{{ asset('storage/' . $perangkat->foto) }}" class="img-fluid" alt="" style="border-radius: 5px"></div>
                      <div class="member-info my-2">
                        <h4 class="text-center">{{ $perangkat->nama }}</h4>
                        <p class="text-center">{{ $perangkat->jabatan }}</p>
                        <div class="text-center"> 
                          <a href="/admin/perangkat-desa/{{ $perangkat->id }}/edit" type="button" class="btn btn-warning">Edit Data</a>
                          <form id="{{ $perangkat->id }}" action="/admin/perangkat-desa/{{ $perangkat->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger swal-confirm" data-form="{{ $perangkat->id }}">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              
        </div>

      </div>
    </div>
</div>

@endsection