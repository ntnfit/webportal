@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('../css/purchasing/index.css') }}">

@section('content')
    <div class="container-fluid">
        @if (session('message'))
            <div class="text-success py-2">{{ session('message') }}</div>
        @endif

        <h1 class="text-black-50 title">{{ $title }}</h1>
        <div class="d-flex justify-content-between search-create-button">
            <a href="{{ url('/purchasing/create') }}">
                <button type="button" class="btn btn-primary mb-4">Create new purchasing</button>
            </a>
        </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Purchasing Detail ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Order date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_purchasing as $purchasing)
                    <tr>
                        <td>{{ $purchasing->id }}</td>
                        <td>{{ $purchasing->name }}</td>
                        <td>{{ $purchasing->email }}</td>
                        <td>{{ $purchasing->purchasing_detail_id }}</td>
                        <td>{{ $purchasing->quantity }}</td>

                        <?php
                        $total_format = number_format($purchasing->total, 2, ',', '.');
                        $total_price = explode(',', $total_format)[0];
                        ?>

                        <td>{{ $total_price }}</td>
                        <td>{{ $purchasing->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            @if ($purchasing->status == 0)
                                <span class="text-danger">Unapproved</span>
                            @elseif ($purchasing->status == 1)
                                <span class="text-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/users/edit', $user->id) }}">
                                <button type="button" class="btn btn-info">View</button>
                            </a>
                            <a href="{{ url('/users/edit', $user->id) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
