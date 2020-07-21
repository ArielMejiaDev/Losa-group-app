<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    @include('partials.dashboard.sidebar.sidebar-brand')

    @include('partials.dashboard.sidebar.nav-item', ['route' => route('admin.dashboard'), 'icon' => 'fas fa-fw fa-tachometer-alt', 'label' => __('Dashboard'), 'loading' => true ])

    @include('partials.dashboard.sidebar.header')

    @include('partials.dashboard.sidebar.nav-item', ['route' => route('properties.index'), 'icon' => 'fas fa-fw fa-home', 'label' => __('Properties') ])

    @include('partials.dashboard.sidebar.nav-item', ['route' => route('aircrafts.index'), 'icon' => 'fas fa-fw fa-plane', 'label' => __('Aircrafts')])

    @include('partials.dashboard.sidebar.nav-item', ['route' => route('users.index'), 'icon' => 'fas fa-fw fa-users', 'label' => __('Users') ])

    @admin
    @include('partials.dashboard.sidebar.nav-item', ['route' => route('sync.index'), 'icon' => 'fas fa-fw fa-sync', 'label' => __('Sync') ])

    {{-- @include('partials.dashboard.sidebar.nav-item', ['route' => route('users.index'), 'icon' => 'fas fa-fw fa-trash', 'label' => __('Trashed') ]) --}}

    <li class="nav-item mb-3">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <i class="fas fa-fw fa-trash"></i>
            <span>{{ __('Trashed') }}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('Users') }}</h6>
            <a class="collapse-item" href="{{ route('users-trashed.index') }}">{{ __('Users') }}</a>
            <a class="collapse-item" href="{{ route('admins-trashed.index') }}">{{ __('Admins') }}</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">{{ __('Admin') }}</h6>
            <a class="collapse-item" href="{{ route('properties-trashed.index') }}">{{ __('Properties') }}</a>
            <a class="collapse-item" href="{{ route('aircrafts-trashed.index') }}">{{ __('Aircrafts') }}</a>
            </div>
        </div>
    </li>
    @endadmin

    @include('partials.dashboard.sidebar.toggle')

</ul>