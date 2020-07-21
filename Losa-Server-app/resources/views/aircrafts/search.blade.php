@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

@include('partials.table-content', [
    'header'                    =>          [ 'title' => __('Search Results'), 'withSearchbox' => true, 'route' => route('aircrafts.search'), 'icon' => 'fas fa-search' ],
    'table'                     =>          'partials.aircrafts.table',
    'footer'                    =>          $aircrafts->links(),
])
@endsection
