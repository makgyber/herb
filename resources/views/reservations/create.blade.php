@extends('app')
@section('sidebar')
    <ul class="nav nav-sidebar">
        <li><a href="{{ url('reservations') }}">Dashboard</a></li>
        <li><a href="{{ url('reservations') }}">Reports</a></li>
    </ul>
@endsection

@section('content')

    <h3>Create New Reservation for Room # {{ $door }}</h3>
@endsection