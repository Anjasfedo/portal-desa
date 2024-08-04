@extends('layouts.main')

@section('content')
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        @foreach ($sliders as $key => $slider)
        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}" style="background-image: url({{ asset('storage/' . $slider->img_slider) }});">
          <div class="carousel-container">
            <div class="carousel-content container">
              <h2 class="animate__animated animate__fadeInDown">{{ $slider->judul }}</h2>
              <p class="animate__animated animate__fadeInUp">{{ $slider->deskripsi }}</p>
              <a href="{{ $slider->link_btn }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section><!-- End Hero -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <div class="icon"><i class="bi bi-bar-chart-line-fill"></i></div>
        <h4 class="title"><a href="/data-desa">Statistik</a></h4>
      </div>
      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <div class="icon"><i class="bi bi-globe-asia-australia"></i></div>
        <h4 class="title"><a href="/peta-desa">Peta Desa</a></h4>
      </div>
      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <div class="icon"><i class="bi bi-shop"></i></div>
        <h4 class="title"><a href="/umkm">UMKM Desa</a></h4>
      </div>
      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <div class="icon"><i class="bi bi-telephone-forward"></i></div>
        <h4 class="title"><a href="/kontak">Pengaduan</a></h4>
      </div>
    </div>
    
  </div>
</section>

<!-- ======= Video Section ======= -->
<section id="services" class="services mx-4">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Video Profile</h2>
    </div>

    <div class="row">
      <div class="col-lg-10 mx-auto">
        <iframe width="100%" height="500" src="{{ $videoProfil->url_video }}" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>


<section class="counts section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Berita Desa</h2>
    </div>

    <div class="row">

      @foreach ($beritas as $berita)
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="count-box news-card">
                    <div class="card">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="card-text">{{ $berita->excerpt }}</p>
                            <div class="news-date">{{ $berita->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="card-footer">
                          <a href="/berita/{{ $berita->slug }}" type="button" class="btn btn-link float-end">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

     
      <div class="button" style="text-align: center">
        <a class="btn btn-primary mx-auto" href="/berita" role="button">Lihat Semua</a>
      </div>
      
    </div>

  </div>
</section>
@endsection