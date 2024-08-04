@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
        <div class="section-title">
            <h2>{{ $wilayah->judul }}</h2>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                {!! $wilayah->body !!}
            </div>
        </div>
    </div>
</section>
@endsection
