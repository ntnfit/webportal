@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('../css/items/index.css') }}">

@section('content')
    <div class="container-fluid h-100">
        @if (session('message'))
            <div class="text-success py-2">{{ session('message') }}</div>
        @endif

        <h1 class="text-black-50 title">{{ $title }}</h1>
        <div class="d-flex justify-content-between search-create-button">
            <a href="{{ url('/items/show-create') }}">
                <button type="button" class="btn btn-primary mb-4">Create new item</button>
            </a>

            <form method="" action="" class="w-75 search" autocomplete="off">
                @csrf

                <div class="input-group md-form form-sm form-2 pl-0 mb-4">
                    <input class="form-control my-0 py-1 amber-border" type="search" name="search"
                        placeholder="Search by name..." aria-label="Search" value="">
                    <button type="submit" class="btn btn-primary">
                        <span><i class="fas fa-search text-light" aria-hidden="true"></i></span>
                    </button>
                </div>
            </form>
        </div>

        <div class="pagination-wrap">
            @if (count($all_item) <= 3 && $search)
                <div class="d-flex gap-5">
                    <h6 class="text total-results">
                        Total of results search with '{{ $search }}' is {{ count($all_item) }}
                    </h6>
                </div>
            @elseif ($search != '')
                <h6 class="text total-results">
                    Total of results search with '{{ $search }}' is {{ count($all_item) }}
                </h6>
            @else
                {{ $all_item->links() }}
            @endif
        </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_item as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->name }}</td>
                        <?php
                        $price_format = number_format($item->price, 2, ',', '.');
                        $price = explode(',', $price_format)[0];
                        ?>
                        <td>{{ $price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $item->updated_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            @if ($item->status == 0)
                                <span class="text-danger">Unapproved</span>
                            @elseif ($item->status == 1)
                                <span class="text-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/items/edit', $item->id) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
