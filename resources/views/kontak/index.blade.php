@extends('layouts.main')

@section('content')
        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
      
              <div class="section-title">
                <h2>Kontak Kami</h2>
              </div>
      
              <div class="row">
                <div class="col-lg-6 d-flex" data-aos="fade-up">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Lokasi Desa</h3>
                    <div class="card-body p-2">
                      <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=402&amp;hl=en&amp;q={{ urlencode($kontak->lokasi) }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                  </div>
                </div>
      
                <div class="col-lg-6" data-aos="fade-up">
                  <div class="info-box" style="height: 250px;"> <!-- Ubah tinggi sesuai kebutuhan -->
                    <div class="mx-auto pt-4">
                      <i class="bx bx-envelope"></i>
                      <h3>Email Kami</h3>
                      <p>{{ $kontak->email }}</p>
                    </div>
                  </div>

                  <div class="info-box" style="height: 250px;"> <!-- Ubah tinggi sesuai kebutuhan -->
                    <div class="mx-auto pt-4">
                      <i class="bx bx-phone-call"></i>
                      <h3>Nomor HP Kami</h3>
                      <p>{{ $kontak->no_hp }}</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section><!-- End Contact Us Section -->
@endsection
