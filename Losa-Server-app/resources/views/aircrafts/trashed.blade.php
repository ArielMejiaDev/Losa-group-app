@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')


    @include('partials.table-content', [
        'header'                    =>          [ 'title' => __('Aircrafts'), 'withSearchbox' => false, 'route' => route('aircrafts.search'), 'icon' => 'fas fa-airplane' ],
        'table'                     =>          'partials.aircrafts.trashed-table',
        'footer'                    =>          $aircrafts->links(),
    ])

@endsection
