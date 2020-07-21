@extends('layouts.login')
@section('content')

<div id="loader" class="d-none h-100 bg-blue">
    <div class="spinner align-items-center justify-content-center">
        <div class="dot1"></div>
        <div class="dot2"></div>
    </div>
</div>

<div id="login" class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
        </div>
        <div class="col-md-8 col-lg-6">
            <div class="mt-5">
                @include('partials.notifications')
            </div>
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            @include('partials.login.login-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@stack('scripts')
