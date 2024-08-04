@extends('layouts.app')

@section('auth')
    <div class="col-md-8 col-lg-6 col-xxl-3">
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src="admin/assets/images/auth/logo.png" width="180" alt="Logo">
                        </a>
                    </div>
                    <div class="col-md-6">
                        @if (session()->has('password-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('password-success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus>
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                    required autocomplete="password">
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input primary" type="checkbox" value=""
                                        id="flexCheckChecked" checked>
                                    <label class="form-check-label text-dark" for="flexCheckChecked">
                                        Ingat perangkat ini
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>

                            {{-- <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-bold">Belum punya akun ?</p>
                            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Buat akun baru</a>
                        </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
