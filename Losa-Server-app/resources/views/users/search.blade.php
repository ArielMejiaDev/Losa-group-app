@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

@include('partials.table-content', [
    'header'                    =>          [ 'title' => __('Search Results'), 'withSearchbox' => true, 'route' => route('users.search'), 'icon' => 'fas fa-search' ],
    'table'                     =>          'partials.users.table',
    'footer'                    =>          $users->links(),
])
@endsection
