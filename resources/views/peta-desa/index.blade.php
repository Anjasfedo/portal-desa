@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
  
      <div class="section-title">
        <h2>{{ $petaDesa->judul }}</h2>
      </div>
  
      <div class="row">
        <div class="col-lg-10 mx-auto p-3">
            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q={{ urlencode($petaDesa->alamat) }}&amp;t=h&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        </div>
      </div>
    </div>
  </section>
@endsection