@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('../css/items.css') }}">

@section('content')
    <div class="container-fluid h-100">
        @if (session('message'))
            <div class="text-success py-2">{{ session('message') }}</div>
        @endif

        <h1 class="text-black-50 title">{{ $title }}</h1>
        <form method="post" action="{{ url('items/update/' . $item->id) }}">
            @csrf
            @method('put')

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value={{ $item->name }}>
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
                    class="form-control text-secondary @error('price') is-invalid @enderror" value={{ $item->price }}>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="number" min="1" name="quantity"
                    class="form-control @error('quantity') is-invalid @enderror" value={{ $item->quantity }}>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="status">Status</label>
            <div class="form-check">
                <input class="form-check-input" name="status" type="radio" value="0" id="unapproved"
                    {{ $item->status == 0 ? 'checked' : '' }}>
                <label class="form-check-label text-danger">
                    Unapproved
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="status" type="radio" value="1" id="approved"
                    {{ $item->status == 1 ? 'checked' : '' }}>
                <label class="form-check-label text-success" for="approved">
                    Approved
                </label>
            </div>

            <div class="row justify-content-center">
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Update item</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection
