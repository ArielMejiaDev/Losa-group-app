{{--  Nav Item - User Information  --}}
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
        <img class="img-profile rounded-circle" src="{{ asset('assets/images/avatar.png') }}">
    </a>
    {{--  Dropdown - User Information  --}}
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        {{-- <div class="dropdown-divider"></div> --}}

        @admin
        <a href="{{ route('invite-admin.index', auth()->user() ) }}" class="dropdown-item">
            <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ __('Invite Admin') }}
        </a>
        @endadmin

        <div class="dropdown-divider"></div>

        <a href="{{ route('change-password.edit', auth()->user() ) }}" class="dropdown-item">
            <i class="fas fa-unlock fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ __('Change Password') }}
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ __('Logout') }}
        </a>

    </div>
</li>