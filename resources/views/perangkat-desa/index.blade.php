@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
  
      <div class="section-title">
        <h2>Perangkat Desa Kragilan</h2>
      </div>
  
      <div class="row">
        @foreach ($perangkatDesa as $perangkat)
          <div class="col-xl-3 my-3" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="{{ asset('storage/' . $perangkat->foto) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{ $perangkat->nama }}</h4>
                  <span>{{ $perangkat->jabatan }}</span>
                </div>
              </div>
          </div>
        @endforeach
      </div>
      
    </div>
  </section>
@endsection