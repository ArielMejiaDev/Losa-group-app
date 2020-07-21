@if ($withSearchbox)
    <p class="lead d-none d-sm-block">
        @isset ($icon)
        <i class="{{ $icon }} mr-2"></i>  
        @endisset
        {{ __($title) }}
    </p>
    @isset($route)
    <form class="form-inline mt-md-0" action="{{ $route }}" method="GET">
        <input class="form-control mr-sm-2" type="text" placeholder="{{ __('Search') }}" name="query" id="query" aria-label="Search">
        {{-- Submit for large screens --}}
        <button class="btn btn-block btn-outline-success d-block d-sm-none mt-2" type="submit">{{ __('Search') }}</button>
        {{-- Submit for med and sm screens --}}
        <button class="btn btn-outline-success d-none d-sm-block" type="submit">{{ __('Search') }}</button>
    </form>
    @endisset
@else
    <p class="lead d-none d-sm-block">
        @isset ($icon)
            <i class="{{ $icon }} mr-2"></i>
        @endisset
        {{ __($title) }}
    </p>
@endif