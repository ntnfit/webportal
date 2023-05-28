@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('../css/items.css') }}">

@section('content')
    <div class="container-fluid h-100">
        @if (session('message'))
            <div class="text-success py-2">{{ session('message') }}</div>
        @endif

        <h1 class="text-black-50 title">{{ $title }}</h1>
        <form method="post" action="{{ url('items/insert') }}">
            @csrf

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Item name">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fa fa-list-alt"></span></div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="number" min="1" name="price"
                    class="form-control text-secondary @error('price') is-invalid @enderror" placeholder="Price">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="number" min="1" name="quantity"
                    class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity">
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row justify-content-center">
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Create item</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection
