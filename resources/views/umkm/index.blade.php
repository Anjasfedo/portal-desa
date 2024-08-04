@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
        <div class="section-title">
            <h2>UMKM Desa</h2>
        </div>
        <div class="row">
            @foreach ($umkms as $umkm)
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="count-box news-card">
                    <div class="card">
                        <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto UMKM" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $umkm->produk }}</b></h5>
                            <p class="card-text"><i class="bi bi-tag"></i>&nbsp; Rp {{ number_format($umkm->harga, 0, ',', '.') }}</p>
                        </div>
                        <a class="btn btn-success mx-3 my-1" href="https://wa.me/+62{{ $umkm->no_hp }}" role="button"><i class="bi bi-whatsapp"></i>&nbsp; Hubungi Penjual</a>
                        <a class="btn btn-warning mx-3 mb-3" href="/umkm/{{ $umkm->slug }}" role="button"><i class="bi bi-eye"></i>&nbsp; Detail Produk</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="paginate my-3" style="text-align: center">
            {{ $umkms->links() }}
        </div>
    </div>
</section>
@endsection
