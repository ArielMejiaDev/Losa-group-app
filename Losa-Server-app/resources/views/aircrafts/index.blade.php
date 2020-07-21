@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

@admin
    @include('partials.table-content', [
        'header'                    =>          [ 'title' => __('Aircrafts'), 'withSearchbox' => true, 'route' => route('aircrafts.search'), 'icon' => 'fas fa-airplane' ],
        'createButtonRoute'         =>          route('aircrafts.create'),
        'table'                     =>          'partials.aircrafts.table',
        'footer'                    =>          $aircrafts->links(),
    ])
@else
    @include('partials.table-content', [
        'header'                    =>          [ 'title' => __('Aircrafts'), 'withSearchbox' => true, 'route' => route('aircrafts.search'), 'icon' => 'fas fa-airplane' ],
        'table'                     =>          'partials.aircrafts.table',
        'footer'                    =>          $aircrafts->links(),
    ])
@endadmin

@endsection
