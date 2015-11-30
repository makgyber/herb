@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ReservedRoomDates</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('reservedRoomDates.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($reservedRoomDates->isEmpty())
                <div class="well text-center">No ReservedRoomDates found.</div>
            @else
                @include('reservedRoomDates.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $reservedRoomDates])


    </div>
@endsection