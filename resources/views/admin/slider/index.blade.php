@extends('admin.layouts.main')

@section('content')
<style>
    .custom-card {
        width: 100%;
        height: 375px; /* Atur tinggi kartu sesuai kebutuhan */
    }

    .card-img {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        background-size: cover; /* Untuk mengisi kartu dengan gambar tanpa pemotongan */
    }
</style>
  
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Gambar Slider</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/" type="button" class="btn btn-warning float-end" target="_blank">Live Preview</a>
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
                @foreach ($sliders as $slider)
                <div class="col-md-4">
                    <div class="card custom-card mb-4">
                        <div class="card-img" style="background-image: url('{{ asset('storage/' . $slider->img_slider) }}');"></div>
                        <div class="card-body">
                            <p>Slider {{ $loop->iteration }}</p>
                            <h5 class="card-title">{{ $slider->judul }}</h5>
                            <a href="/admin/slider/{{ $slider->id }}/edit" type="button" class="btn btn-warning">Edit</a>
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