@extends('admin.layouts.main')

@section('content')
<div class="row">
  <div class="col-lg-12">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-primary">
            <div class="row">
              <div class="col-lg-6">
                <h4 class="card-title my-5 fw-semibold text-white">Selamat Datang {{ auth()->user()->name }}, Di Website Portal {{ $nm_desa }}</h4>
              </div>
              <div class="col-lg-6">
                <img src="/admin/assets/images/dashboard/welcome.svg" alt="Selamat Datang" style="width: 300px;" class="float-end">
              </div>
            </div>
          </div>
      </div>
  </div>
</div>


<div class="row">
  <div class="col-lg-4">
    <div class="card overflow-hidden bg-danger text-white">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold text-white">Visitor Hari Ini</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3 text-white">{{ $viewsToday }}</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-center">
                <i class="ti ti-user-check" style="font-size: 2rem;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card overflow-hidden bg-success text-white">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold text-white">Jumlah Berita</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3 text-white">{{ $totalBerita }}</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-center">
                <i class="ti ti-edit" style="font-size: 2rem;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-4">
    <div class="card overflow-hidden bg-warning text-white">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold text-white">Jumlah Produk UMKM</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3 text-white">{{ $totalProduk }}</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-center">
                <i class="ti ti-building-store" style="font-size: 2rem;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-8 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-6">
              <h5 class="card-title fw-semibold">Berita</h5>
          </div>
          <div class="col-6 text-right">
              <a href="/admin/berita" type="button" class="btn btn-warning float-end">Semua</a>
          </div>
        </div>
      </div>
      <div class="card-body p-4">
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">No</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Judul</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Dipost</h6>
                </th>
              </tr>
            </thead>
            <tbody>
             @foreach ($beritas as $berita)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $berita->judul }}</td>
                  <td>{{ $berita->created_at->diffForHumans() }}</td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card w-100">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-6">
              <h5 class="card-title fw-semibold">Komentar</h5>
          </div>
          <div class="col-6 text-right">
            <a href="/admin/komentar" type="button" class="btn btn-warning float-end">Semua</a>
        </div>
        </div>
      </div>
      <div class="card-body p-4">
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">No</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nama</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Komentar</h6>
                </th>
              </tr>
            </thead>
            <tbody>
             @foreach ($komentars as $komentar)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $komentar->nama }}</td>
                  <td>{{ $komentar->body }}</td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection