@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

@include('partials.table-content', [
    'header'                    =>          [ 'title' => __('Admins'), 'withSearchbox' => false, 'icon' => 'fas fa-users' ],
    'createButtonRoute'         =>          route('invite-admin.create'),
    'table'                     =>          'partials.admin-users.table',
    'footer'                    =>          $users->links(),
])

@endsection
