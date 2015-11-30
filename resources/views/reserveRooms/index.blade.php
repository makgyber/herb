@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ReserveRooms</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('reserveRooms.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($reserveRooms->isEmpty())
                <div class="well text-center">No ReserveRooms found.</div>
            @else
                @include('reserveRooms.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $reserveRooms])


    </div>
@endsection