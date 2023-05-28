@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('../css/purchasing/create.css') }}">

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50 title">{{ $title }}</h1>
        <form method="post" action="{{ url('purchasing/insert') }}">
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
                    class="form-control text-secondary @error('email') is-invalid @enderror" placeholder="Email" disabled>
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="button" id="btn-add" class="btn btn-primary mb-4">Add new item</button>
            <table class="table purchasing-table">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="dynamic-table">
                    <tr>
                        <td>
                            <div class="input-group mb-3 item-input">
                                <input class="input-field" type="text" name="item_name" placeholder="Name"
                                    id="item-name">
                                @error('item_name')
                                    <span class="error-message" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3 item-input">
                                <input class="input-field" type="number" min="1" name="item_price" id="item-price"
                                    placeholder="Price">
                                @error('item_price')
                                    <span class="error-message" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3 item-input">
                                <input class="input-field" type="number" min="1" name="item_quantity"
                                    id="item-quantity" placeholder="Quantity">
                                @error('item_quantity')
                                    <span class="error-message" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-danger" id="btn-delete" disabled>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success d-flex mx-auto justify-content-center">Submit</button>
        </form>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-add').click(function() {
            let html = '';
            html += '<tr>';
            html += '<td>';
            html += '<div class="input-group mb-3 item-input">';
            html +=
                '<input class="input-field" type="text" name="item_name" placeholder="Name" id="item-name">';
            html += '@error('item_name')';
            html += '<span class="error-message" role="alert">{{ $message }}</span>';
            html += '@enderror';
            html += '</div>';
            html += '</td>';


            html += '<td>';
            html += '<div class="input-group mb-3 item-input">';
            html +=
                '<input class="input-field" type="text" name="item_price" placeholder="Price" id="item-price">';
            html += '@error('item_price')';
            html += '<span class="error-message" role="alert">{{ $message }}</span>';
            html += '@enderror';
            html += '</div>';
            html += '</td>';


            html += '<td>';
            html += '<div class="input-group mb-3 item-input">';
            html +=
                '<input class="input-field" type="text" name="item_quantity" placeholder="Quantity" id="item-quantity">';
            html += '@error('item_quantity')';
            html += '<span class="error-message" role="alert">{{ $message }}</span>';
            html += '@enderror';
            html += '</div>';
            html += '</td>';

            html += '<td>';
            html += '</td>';


            html += '<td>';
            html +=
                '<button type="button" class="btn btn-danger" id="btn-delete"><i class="fa fa-trash"></i></button>';
            html += '</td>';
            html += '</tr>';

            $('#dynamic-table').append(html);
        });

        $('#dynamic-table').on('click', '#btn-delete', function() {
            $(this).closest('tr').remove();
        })
    });
</script>
