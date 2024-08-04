@extends('layouts.main')

@section('content')
    <section class="counts section-bg">
        <div class="section-title">
            <h2>Pengumuman</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($pengumumans as $pengumuman)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body p-3">
                                <h5 class="card-title mb-3"><b>{{ $pengumuman->judul }}</b></h5>
                                <span><i class="bi bi-stopwatch-fill"></i>
                                    {{ $pengumuman->created_at->diffForHumans() }}</span>
                                <p class="mt-3">{!! $pengumuman->excerpt !!} <a
                                        href="/pengumuman/{{ $pengumuman->slug }}">Selengkapnya</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="paginate my-3" style="text-align: center">
                {{ $pengumumans->links() }}
            </div>
        </div>
    </section>
@endsection
