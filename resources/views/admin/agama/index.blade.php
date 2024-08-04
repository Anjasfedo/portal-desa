@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Data Agama</h5>
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
                                <th>Agama</th>
                                <th>Jumlah Penganut</th>
                                <th>Perbarui Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agamas as $agama)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $agama->agama }}</td>
                                    <td>{{ $agama->penganut }}</td>
                                    <td>
                                        <a href="/admin/agama/{{ $agama->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
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