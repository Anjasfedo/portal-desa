@extends('layouts.app')

@section('auth')
<div class="col-lg-10">
    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <img src="admin/assets/images/auth/logo.png" width="220" alt="Logo">
                    </a>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('register') }}">
        
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="textHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Daftar Sebagai</label>
                            <select id="role_id" name="role_id" class="form-select">
                                <option value="2" selected>Pengunjung</option>
                            </select>
                        </div>
        
                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-bold">Sudah punya akun ?</p>
                            <a class="text-primary fw-bold ms-2" href="/login">Masuk</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
