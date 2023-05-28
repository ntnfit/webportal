@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('../css/users/index.css') }}">

@section('content')
    <div class="container-fluid h-100">
        @if (session('message'))
            <div class="text-success py-2">{{ session('message') }}</div>
        @endif

        @if ($user->role == 0)
            <h1 class="text-black-50 title">{{ $title }}</h1>
            <div class="d-flex justify-content-between search-create-button">
                <a href="{{ url('/users/show-create') }}">
                    <button type="button" class="btn btn-primary mb-4">Create new user</button>
                </a>

                <form method="" action="" class="w-75 search" autocomplete="off">
                    @csrf

                    <div class="input-group md-form form-sm form-2 pl-0 mb-4">
                        <input class="form-control my-0 py-1 amber-border" type="search" name="search"
                            placeholder="Search by name or email..." aria-label="Search" value="{{ $search }}">
                        <button type="submit" class="btn btn-primary">
                            <span><i class="fas fa-search text-light" aria-hidden="true"></i></span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="pagination-wrap">
                @if (count($all_user) <= 3 && $search)
                    <div class="d-flex gap-5">
                        <h6 class="text total-results">
                            Total of results search with '{{ $search }}' is {{ count($all_user) }}
                        </h6>
                    </div>
                @elseif ($search != '')
                    <h6 class="text total-results">
                        Total of results search with '{{ $search }}' is {{ count($all_user) }}
                    </h6>
                @else
                    {{ $all_user->links() }}
                @endif
            </div>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_user as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $user->updated_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                @if ($user->status == 0)
                                    <span class="text-primary">Pending</span>
                                @elseif ($user->status == 1)
                                    <span class="text-success">Approved</span>
                                @elseif ($user->status == 2)
                                    <span class="text-danger">Banned</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/users/edit', $user->id) }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif ($user->role == 1)
            <h1 class="text-black-50">Account Information</h1>
            <form method="" action="">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" value={{ $user->name }}
                        class="form-control @error('name') is-invalid @enderror" placeholder="Full name" disabled>
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


                <label for="status">Status</label>
                @if ($user->status == 0)
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="radio" value="0" id="pending" checked>
                        <label class="form-check-label">
                            Pending
                        </label>
                    </div>
                @elseif ($user->status == 1)
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="radio" value="1" id="approved" checked>
                        <label class="form-check-label" for="approved">
                            Approved
                        </label>
                    </div>
                @elseif ($user->status == 2)
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="radio" value="2" id="banned" checked>
                        <label class="form-check-label" for="banned">
                            Banned
                        </label>
                    </div>
                @endif
        @endif

    </div>
@endsection
