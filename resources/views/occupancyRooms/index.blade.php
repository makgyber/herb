@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">OccupancyRooms</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('occupancyRooms.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($occupancyRooms->isEmpty())
                <div class="well text-center">No OccupancyRooms found.</div>
            @else
                @include('occupancyRooms.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $occupancyRooms])


    </div>
@endsection