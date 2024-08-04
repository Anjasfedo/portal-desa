@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Komentar</h5>
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
                                <th>Nama</th>
                                <th>Berita</th>
                                <th>Komentar</th>
                                <th>Balasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->nama }}</td>
                                    <td>{{ $comment->berita->judul }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td>{{ $comment->replies->count() }} balasan</td>
                                    <td>
                                        <a href="/berita/{{ $comment->berita->slug }}" type="button" target="_blank" class="btn btn-success mb-1"><i class="ti ti-eye-check"></i></a>
                                        <form id="{{ $comment->id }}" action="/admin/komentar/{{ $comment->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="button" class="btn btn-danger swal-confirm mb-1" data-form="{{ $comment->id }}"><i class="ti ti-trash"></i></button>
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