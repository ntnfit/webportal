<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ url('/images/adv-logo1.jpg')}}" alt="Logo" class="logo-img" >
        {{-- <span class="brand-text font-weight-bold d-flex justify-content-center"></span> --}}
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
