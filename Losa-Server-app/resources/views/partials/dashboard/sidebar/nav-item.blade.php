<li class="nav-item">
    @empty($loading)
    <a class="nav-link" href="{{ $route }}">
    @else
    <a onclick="loading()" class="nav-link" href="{{ $route }}">
    @endempty
    <i class="{{ $icon }}"></i>
    <span>{{ __($label) }}</span></a>
</li>
<hr class="sidebar-divider">