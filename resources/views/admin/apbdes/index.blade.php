@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Data APBDES</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/apbdes/create" type="button" class="btn btn-warning float-end">Tambah Produk</a>
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
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggarans as $anggaran)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/' . $anggaran->gambar) }}" alt="gambar anggaran"
                                                    class="img-fluid" style="max-height: 300px; max-width: 300px"></td>
                                            <td>{{ $anggaran->judul }}</td>
                                            <td>{!! $anggaran->keterangan !!}</td>
                                            <td>
                                                <a href="/apbdes/{{ $anggaran->slug }}" type="button" target="_blank"
                                                    class="btn btn-success mb-1"><i class="ti ti-eye-check"></i></a>
                                                <a href="/admin/apbdes/{{ $anggaran->id }}/edit" type="button"
                                                    class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                                <form id="{{ $anggaran->id }}" action="/admin/apbdes/{{ $anggaran->id }}"
                                                    method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger swal-confirm mb-1"
                                                        data-form="{{ $anggaran->id }}"><i class="ti ti-trash"></i></button>
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
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
