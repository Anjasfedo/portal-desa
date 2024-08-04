@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
        <div class="section-title">
            <h2>Visi & Misi</h2>
        </div>
  
        <div class="row">
            <div class="col-lg-10 mx-auto p-3">
                <div class="visi-misi">
                    <div class="visi mb-3">
                        <h4>Visi</h4>
                        <p>{!! $visiMisi->visi !!}</p>
                    </div>
                    <div class="misi mb-3">
                        <h4>Misi</h4>
                        <p>{!! $visiMisi->misi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
