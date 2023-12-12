@extends('layouts.auth')

@section('title', 'Admin Inventory - Login')

@section('content')

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                            </div>
                            <form class="user" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" placeholder="Nama">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ session('success') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Alamat Email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ session('success') }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ session('success') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>
                            <hr>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Sudah memiliki akun? Masuk!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>