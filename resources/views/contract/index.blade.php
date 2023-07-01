@extends('layouts.app')
@section('title')
   Contract
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ mix('assets/css/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/admin_panel.css') }}">
@endsection
@section('content')

@endsection
@section('page_js')
    <script src="{{ mix('assets/js/jquery.toast.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let token = '{{ csrf_token() }}'
        let AuthUserRoleId = "{{ isset(getLoggedInUser()->roles) ? getLoggedInUser()->roles->first()->id : '' }}"
    </script>
@endsection
