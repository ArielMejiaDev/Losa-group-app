@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

@admin
    @include('partials.table-content', [
        'header'                    =>          [ 'title' => 'Users', 'withSearchbox' => true, 'route' => route('users.search'), 'icon' => 'fas fa-users' ],
        'createButtonRoute'         =>          route('register.create'),
        'table'                     =>          'partials.users.table',
        'footer'                    =>          $users->links(),
    ])
@else
    @include('partials.table-content', [
        'header'                    =>          [ 'title' => 'Users', 'withSearchbox' => true, 'route' => route('users.search'), 'icon' => 'fas fa-users' ],
        'table'                     =>          'partials.users.table',
        'footer'                    =>          $users->links(),
    ])
@endadmin

@endsection
