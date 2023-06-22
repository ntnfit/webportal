@extends('adminlte::page')
@section('title', 'List users')
@section('plugins.Sweetalert2', true)
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <livewire:users />
    <livewire:user-table/>
@endsection
@push('js')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>

    document.addEventListener('alert', event => {
        Swal.fire({
                position: 'top-end',
                type: 'success',
                toast: true,
                title: event.detail.message,
                showConfirmButton: false,
                timer: 3000
            })
            console.log("okay");
            $('#myModal').modal('hide');
            $('#statusModal').modal('hide');
            $('#editModal').modal('hide');
            $('.modal-backdrop').removeAttr('class');
            });
</script>
@endpush
