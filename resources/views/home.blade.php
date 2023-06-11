@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50 title">{{ $title }}</h1>

        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="{{ url('/images/image-home-3.avif') }}" class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"  type="image/avif"/>

                <img src="{{ url('/images/image-home-1.avif') }}" class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ url('/images/image-home-4.avif') }}" class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds" />

                <img src="{{ url('/images/image-home-5.avif') }}" class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ url('/images/image-home-6.avif') }}"" class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea" />

                <img src="{{ url('/images/image-home-2.avif') }}" class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park" />
            </div>
        </div>
    </div>
@endsection
