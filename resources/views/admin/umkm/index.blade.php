@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Data Umkm Desa</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/umkm/create" type="button" class="btn btn-warning float-end">Tambah Produk</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="table-responsive">
                    <table id="table_id" class="table display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($umkms as $umkm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto UMKM" class="img-fluid" style="max-height: 200px; max-width: 200px"></td>
                                <td>{{ $umkm->produk }}</td>
                                <td><span class="badge text-bg-primary">Rp. {{ $umkm->harga }}</span></td>
                                <td>
                                    <a href="/umkm/{{ $umkm->slug }}" type="button" target="_blank" class="btn btn-success mb-1"><i class="ti ti-eye-check"></i></a>
                                    <a href="/admin/umkm/{{ $umkm->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                    <form id="{{ $umkm->id }}" action="/admin/umkm/{{ $umkm->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger swal-confirm mb-1" data-form="{{ $umkm->id }}"><i class="ti ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    });
</script>

@endsection