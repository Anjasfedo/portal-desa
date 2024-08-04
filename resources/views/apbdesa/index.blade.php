@extends('layouts.main')

@section('content')
    <section class="counts section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Anggaran Desa / APBDES</h2>
            </div>
            <div class="row">
                @foreach ($anggarans as $anggaran)
                    <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                        <div class="count-box news-card">
                            <div class="card">
                                <img src="{{ asset('storage/' . $anggaran->gambar) }}" alt="gambar anggaran"
                                    class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $anggaran->judul }}</b></h5>

                                </div>

                                <a class="btn btn-primary mx-3 mb-3" href="/apbdesa/{{ $anggaran->slug }}" role="button"><i
                                        class="bi bi-eye"></i>&nbsp; Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="paginate my-3" style="text-align: center">
                {{ $anggarans->links() }}
            </div>
        </div>
    </section>
@endsection
