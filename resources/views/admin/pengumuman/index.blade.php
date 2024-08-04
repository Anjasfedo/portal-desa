@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Semua Pengumuman</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/pengumuman/create" type="button" class="btn btn-warning float-end">Tambah
                                Pengumuman</a>
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
                                        <th>Judul</th>
                                        <th>Pengumuman</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcements as $pengumuman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengumuman->judul }}</td>
                                            <td>{!! $pengumuman->excerpt !!}</td>
                                            <td>
                                                <a href="/pengumuman/{{ $pengumuman->slug }}" type="button" target="_blank"
                                                    class="btn btn-success mb-1"><i class="ti ti-eye-check"></i></a>
                                                <a href="/admin/pengumuman/{{ $pengumuman->id }}/edit" type="button"
                                                    class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                                <form id="{{ $pengumuman->id }}"
                                                    action="/admin/pengumuman/{{ $pengumuman->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger swal-confirm mb-1"
                                                        data-form="{{ $pengumuman->id }}"><i
                                                            class="ti ti-trash"></i></button>
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
