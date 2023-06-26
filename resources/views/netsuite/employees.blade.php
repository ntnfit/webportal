@extends('layouts.app')
@section('page_css')
<link rel="stylesheet" href="{{ asset('vendor/livewire-power/powergrid.css') }}">
@endsection
@section('content')
<livewire:employee-table/>
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('vendor/livewire-power/powergrid.js') }}">
@endsection
