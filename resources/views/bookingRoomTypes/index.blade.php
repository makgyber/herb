@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">BookingRoomTypes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('bookingRoomTypes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($bookingRoomTypes->isEmpty())
                <div class="well text-center">No BookingRoomTypes found.</div>
            @else
                @include('bookingRoomTypes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $bookingRoomTypes])


    </div>
@endsection