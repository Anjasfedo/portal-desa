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
                                    <p><a href="/pengumuman">Pengumuman</a> >> <a
                                            href="{{ $pengumuman->slug }}">{{ $pengumuman->judul }}</a></p>

                                    <h1 class="mb-3">{{ $pengumuman->judul }}</h1>

                                    <div class="news-date mb-4">
                                        <span class="mr-3"> <i class="bi bi-stopwatch-fill"></i>
                                            {{ $pengumuman->created_at->diffForHumans() }}</span> |
                                        <span class="mr-3"><i class="bi bi-person-circle">
                                                {{ $pengumuman->user->name }}</i></span> |
                                        <span><i class="bi bi-fire">Dibaca {{ $pengumuman->views }} Kali</i></span>
                                    </div>

                                    <p>{!! $pengumuman->isi_pengumuman !!}</p>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
