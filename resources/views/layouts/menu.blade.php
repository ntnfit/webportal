@can('manage_conversations')
<li class="nav-item {{ Request::is('conversations*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('conversations*') ? 'active' : '' }}" href="{{ url('conversations')  }}">
        <i class="fa fa-commenting nav-icon me-4"></i>
        <span style="font-size: initial;">{{ __('messages.conversations') }}</span>
    </a>
</li>
@endcan

<li class="nav-item {{ Request::is('MasterData*') ? 'active' : '' }}">

    <li style="text-align: left" class="nav-item {{ Request::is('MasterData*') ? 'active' : '' }} btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">

           
      <span style="font-size: initial;color: #9899ac;font-weight: 500; margin-left: 15px">  <i class="fa fa-database nav-icon me-4 {{ Request::is('MasterData*') ? 'active' : '' }}" ></i>  Master data</span>
    </li>
    <div class="collapse {{ Request::is('employees*') ? 'show' : '' }}" id="dashboard-collapse">

      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
        <li class="nav-item {{ Request::is('employees*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('employees*') ? 'active' : '' }}" href="{{ route('employees.index') }}">
                <i class="nav-icon me-4" style="
                   font-size: 20px;">👷</i>
                <span>Employees</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('vendors*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('vendors*') ? 'active' : '' }}" href="{{ route('vendors.index') }}">
                <i class="nav-icon me-4" style="
                  font-size: 20px;">🚛</i>
                <span>vendors</span>
            </a>
        </li>
         <li class="nav-item {{ Request::is('customer*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('customer*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                <i class="nav-icon me-4" style="
                   font-size: 20px;">🤝</i>
                <span>Customers</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('customer*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('customer*') ? 'active' : '' }}" href="{{ route('items.index') }}">
                <i class="nav-icon me-4" style="
                   font-size: 20px;">🥝</i>
                <span>Items</span>
            </a>
        </li>
      </ul>
    </div>
</li>

@can('manage_conversations')
<li class="nav-item {{ Request::is('conversations*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('conversations*') ? 'active' : '' }}" href="{{ url('conversations')  }}">
        <i class="fa fa-commenting nav-icon me-4"></i>
        <span>{{ __('messages.conversations') }}</span>
    </a>
</li>
@endcan
@can('manage_users')
    <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <i class="fa fa-users nav-icon me-4"></i>
            <span>{{ __('messages.users') }}</span>
        </a>
    </li>
@endcan
@can('manage_roles')
    <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
            <i class="fa fa-user nav-icon me-4"></i>
            <span>{{ __('messages.roles') }}</span>
        </a>
    </li>
@endcan
{{-- @can('manage_reported_users')
    <li class="nav-item {{ Request::is('reported-users*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('reported-users*') ? 'active' : '' }}"
           href="{{ route('reported-users.index') }}">
            <i class="fa fa-flag nav-icon me-4"></i>
            <span>{{ __('messages.reported_user') }}</span>
        </a>
    </li>
@endcan --}}
{{-- @if(!Auth::user()->hasRole('Member') && (Auth::user()->hasRole('Admin') || Auth::user()->hasPermissionTo('manage_meetings')))
    <li class="nav-item {{ Request::is('meetings*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('meetings*') ? 'active' : '' }}" href="{{ route('meetings.index') }}">
            <i class="fa fa-stack-exchange nav-icon me-4"></i>
            <span>{{ __('messages.meetings') }}</span>
        </a>
    </li>
@endif
@role('Member')
    <li class="nav-item {{ Request::is('meetings*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('meetings*') ? 'active' : '' }}" href="{{ route('meetings.member_index') }}">
            <i class="fa fa-stack-exchange nav-icon me-4"></i>
            <span>{{ __('messages.meetings') }}</span>
        </a>
    </li>
@endrole
@can('manage_front_cms')
<li class="nav-item {{ Request::is('front-cms*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('front-cms*') ? 'active' : '' }}" href="{{ route('front.cms') }}">
        <i class="fa fa-home nav-icon me-4"></i>
        <span>{{ __('Front CMS') }}</span>
    </a>
</li>
@endcan
--}}
@can('manage_settings')
    <li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('settings*') ? 'active' : '' }}" href="{{ route('settings.index') }}">
            <i class="fa fa-gear nav-icon me-4"></i>
            <span>{{ __('messages.settings') }}</span>
        </a>
    </li>
@endcan 
