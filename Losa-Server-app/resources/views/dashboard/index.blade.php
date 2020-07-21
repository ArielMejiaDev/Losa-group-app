@extends('layouts.admin.dashboard')

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

<div class="container-fluid">
	<div class="row">

        @include('partials.dashboard.stats-card', [ 'title' => __('Users'), 'stat' => $users, 'icon' => 'fa fa-users', 'color' => 'primary' ] )

        @include('partials.dashboard.stats-card', [ 'title' => __('Events'), 'stat' => $totalEvents, 'icon' => 'fas fa-calendar', 'color' => 'success' ] )

        @include('partials.dashboard.stats-card', [ 'title' => __('Properties'), 'stat' => $properties, 'icon' => 'fas fa-home', 'color' => 'info' ] )

        @include('partials.dashboard.stats-card', [ 'title' => __('Aircrafts'), 'stat' => $aircrafts, 'icon' => 'fas fa-plane', 'color' => 'warning' ] )

    </div>
    
    <div class="row">

        @include('partials.dashboard.graph-card', ['title' => __('Properties'), 'graph' => $propertiesChart->container(), 'cols' => 6] )
        
        @include('partials.dashboard.graph-card', ['title' => __('Aircrafts'), 'graph' => $airplaneEvents->container(), 'cols' => 6] )

    </div>

</div>

@endsection
