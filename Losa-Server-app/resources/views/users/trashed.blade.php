@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

@admin
    @include('partials.table-content', [
        'header'                    =>          [ 'title' => __('Users Trashed'), 'withSearchbox' => true, 'route' => route('users.search'), 'icon' => 'fas fa-user-times' ],
        'table'                     =>          'partials.users.trashed-table',
        'footer'                    =>          $users->links(),
    ])
@endadmin

@endsection
