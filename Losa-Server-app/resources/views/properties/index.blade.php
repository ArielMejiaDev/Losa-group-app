@extends('layouts.admin.dashboard')

@section('content')

    @include('partials.notifications')

    @include('partials.table-content', [
        'header'                    =>          [ 'title' => 'Properties', 'withSearchbox' => true, 'route' => route('properties.search'), 'icon' => 'fas fa-building' ],
        'createButtonRoute'         =>          route('properties.create'),
        'table'                     =>          'partials.properties.table',
        'footer'                    =>          $properties->links(),
    ])

@endsection