@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
  
      <div class="section-title">
        <h2>Kategori Berita : {{ $kategori }}</h2>
      </div>
  
      <div class="row">
        @foreach ($beritas as $berita)
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="count-box news-card">
                    <div class="card">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <div class="news-date">{{ $berita->created_at->diffForHumans() }}</div>
                            <p class="card-text">{{ $berita->excerpt }}</p>                           
                        </div>
                        <div class="card-footer">
                            <a href="/berita/{{ $berita->slug }}" type="button" class="btn btn-link float-end">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
      </div>

      {{ $beritas->links() }}

    </div>
  </section>
@endsection