<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        {{-- <i style="color: #ff3750" class="fas fa-laugh-wink"></i> --}}
        <img src="{{ asset('images/icon.png') }}" class="img-fluid rounded-circle" width="50" alt="">
    </div> 
    <div class="sidebar-brand-text mx-3">
        {{ config('app.name', 'Losa') }} 
         <sup></sup> 
    </div>
</a>