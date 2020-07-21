@extends('layouts.admin.dashboard')

@section('content')

    @include('partials.notifications')

    @include('partials.table-content', [
        'header'                    =>          [ 'title' => __('Properties Trashed'), 'withSearchbox' => true, 'route' => route('properties.search'), 'icon' => 'fas fa-building' ],
        //'createButtonRoute'         =>          route('properties.create'),
        'table'                     =>          'partials.properties.trashed-table',
        'footer'                    =>          $properties->links(),
    ])

@endsection