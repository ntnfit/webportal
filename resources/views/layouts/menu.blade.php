<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="fa fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="fa fa-user"></i>
        <p>Users</p>
    </a>
</li>

<?php
$user = Auth::user();
?>
@if ($user->role == 0)
    <li class="nav-item">
        <a href="{{ route('items') }}" class="nav-link {{ Request::is('items') ? 'active' : '' }}">
            <i class="fa fa-list-alt"></i>
            <p>Items</p>
        </a>
    </li>
@endif

<li class="nav-item">
    <a href="{{ route('purchasing') }}" class="nav-link {{ Request::is('purchasing') ? 'active' : '' }}">
        <i class="fa fa-arrows-alt"></i>
        <p>Purchasing</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('sales') }}" class="nav-link {{ Request::is('sales') ? 'active' : '' }}">
        <i class="fa fa-shopping-cart"></i>
        <p>Sales</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('fix-asset') }}" class="nav-link {{ Request::is('fix-asset') ? 'active' : '' }}">
        <i class="fa fa-credit-card"> </i>
        <p>Fixed Assets</p>
    </a>
</li>

<script src="{{ asset('js/sidebar.js') }}"></script>
