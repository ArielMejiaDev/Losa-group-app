@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

@include('partials.table-content', [
    'header'                    =>          [ 'title' => __('Admins Trashed'), 'withSearchbox' => false, 'icon' => 'fas fa-user-shield' ],
    'table'                     =>          'partials.admin-users.trashed-table',
    'footer'                    =>          $users->links(),
])

@endsection
