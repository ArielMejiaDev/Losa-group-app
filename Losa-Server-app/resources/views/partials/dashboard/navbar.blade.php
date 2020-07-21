{{--  Topbar  --}}
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

{{--  Sidebar Toggle (Topbar)  --}}
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

    {{-- @include('partials.dashboard.searchbox') --}}

    {{--  Topbar Navbar  --}}
    <ul class="navbar-nav ml-auto">

        {{-- @include('partials.dashboard.mobile-searchbox') --}}

        <div class="topbar-divider d-none d-sm-block"></div>

        @include('partials.dashboard.user-information')

    </ul>

</nav>
{{--  End of Topbar  --}}