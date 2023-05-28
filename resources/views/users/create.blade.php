@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50 title">{{ $title }}</h1>
        <form method="post" action="{{ url('users/insert') }}">
            @csrf

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Full name">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-user"></span></div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email"
                    class="form-control text-secondary @error('email') is-invalid @enderror" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-lock"></span></div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-lock"></span></div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Create user</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection
