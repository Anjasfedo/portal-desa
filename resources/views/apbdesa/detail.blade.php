@extends('layouts.main')

@section('content')
    <section class="counts section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="card p-3">
                                <div class="card-body">
                                    <p><a href="/apbdesa">Anggaran</a> >> <a
                                            href="{{ $anggaran->slug }}">{{ $anggaran->judul }}</a></p>

                                    <h1 class="mb-3">{{ $anggaran->judul }}</h1>

                                    <div class="news-date mb-4">
                                        <span class="mr-3"><i class="bi bi-person-circle">
                                                Diposting oleh : {{ $anggaran->user->name }}</i></span>
                                    </div>

                                    <img src="{{ asset('storage/' . $anggaran->gambar) }}" alt="Gambar Andalan"
                                        class="img-fluid rounded mb-5" style="height: 450px; width: 100%;">

                                    <p>{!! $anggaran->keterangan !!}</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
