@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
        <div class="section-title">
            <h2>Detail Produk</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row p-4">
                        <div class="col-lg-4">
                            <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Gambar produk" class="img-fluid">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h2 class="card-title"><b>{{ $umkm->produk }}</b></h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($umkm->harga, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td>{!! $umkm->deskripsi !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <a href="https://wa.me/+62{{ $umkm->no_hp }}" class="btn btn-success mt-3" role="button"><i class="bi bi-whatsapp"></i> Hubungi Penjual</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
