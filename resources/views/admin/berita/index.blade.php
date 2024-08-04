@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Berita</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/berita/create" type="button" class="btn btn-warning float-end">Tambah Berita</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="publish-tab" data-toggle="tab" href="#publish" role="tab" aria-controls="publish" aria-selected="true">Publish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="draft-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="draft" aria-selected="false">Draft</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="publish" role="tabpanel" aria-labelledby="publish-tab">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="table_id" class="table display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Excerpt</th>
                                        <th>Penulis</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beritas as $berita)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $berita->judul }}</td>
                                            <td>{{ $berita->excerpt }}</td>
                                            <td>{{ $berita->user->name }}</td>
                                            <td>
                                                @if ($berita->status->status == 'publish')
                                                    <span class="badge text-bg-success p-2">{{ $berita->status->status }}</span>
                                                @else
                                                    <span class="badge text-bg-warning p-2">{{ $berita->status->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/berita/{{ $berita->slug }}" type="button" target="_blank" class="btn btn-success mb-1"><i class="ti ti-eye-check"></i></a>
                                                <a href="/admin/berita/{{ $berita->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                                <form id="{{ $berita->id }}" action="/admin/berita/{{ $berita->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger swal-confirm mb-1" data-form="{{ $berita->id }}"><i class="ti ti-trash"></i></button>
                                                </form>
                                            </td>                                    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="table_draft" class="table display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Excerpt</th>
                                        <th>Penulis</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beritaDraft as $berita)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $berita->judul }}</td>
                                            <td>{{ $berita->excerpt }}</td>
                                            <td>{{ $berita->user->name }}</td>
                                            <td>
                                                @if ($berita->status->status == 'publish')
                                                    <span class="badge text-bg-success p-2">{{ $berita->status->status }}</span>
                                                @else
                                                    <span class="badge text-bg-warning p-2">{{ $berita->status->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/admin/berita/{{ $berita->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                                <form id="{{ $berita->id }}" action="/admin/berita/{{ $berita->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger swal-confirm mb-1" data-form="{{ $berita->id }}"><i class="ti ti-trash"></i></button>
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
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
        $('#table_draft').DataTable();
    });
</script>

<script>
    $(document).ready( function () {
        $('#myTabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>
@endsection

