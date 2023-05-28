@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50 title">{{ $title }}</h1>
        <div class="row">
            <form class="col" method="post" action="{{ url('users/update/' . $user->id) }}">
                @csrf
                @method('put')

                <div class="input-group mb-3">
                    <input type="text" name="name" value={{ $user->name }}
                        class="form-control @error('name') is-invalid @enderror" placeholder="Full name">
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
                    <input type="email" name="email" value={{ $user->email }}
                        class="form-control text-secondary @error('email') is-invalid @enderror" placeholder="Email"
                        disabled>
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
                        placeholder="New password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="status">Status</label>
                <div class="form-check">
                    <input class="form-check-input" name="status" type="radio" value="0" id="pending"
                        {{ $user->status == 0 ? 'checked' : '' }}>
                    <label class="form-check-label text-warning">
                        Pending
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="status" type="radio" value="1" id="approved"
                        {{ $user->status == 1 ? 'checked' : '' }}>
                    <label class="form-check-label text-success" for="approved">
                        Approved
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="status" type="radio" value="2" id="banned"
                        {{ $user->status == 2 ? 'checked' : '' }}>
                    <label class="form-check-label text-danger" for="banned">
                        Banned
                    </label>
                </div>

                <div class="row justify-content-center">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Update user</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>

    </div>
@endsection
