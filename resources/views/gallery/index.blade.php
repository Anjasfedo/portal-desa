@extends('layouts.main')

@section('content')
    <section class="counts section-bg">
        <div class="section-title">
            <h2>Gallery</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($galerrys as $gallery)
                    <div class="col-lg-3">
                        <picture>
                            <img src="{{ asset('storage/' . $gallery->gambar) }}" class="img-fluid img-thumbnail"
                                alt="Gallery" style="width: 300px; height: 200px; object-fit: cover;">
                            <p>{{ $gallery->keterangan }}</p>
                        </picture>
                    </div>
                @endforeach
            </div>
            <div class="paginate my-3" style="text-align: center">
                {{ $galerrys->links() }}
            </div>
        </div>
    </section>
@endsection
