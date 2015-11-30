@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">RoomTypes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('roomTypes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($roomTypes->isEmpty())
                <div class="well text-center">No RoomTypes found.</div>
            @else
                @include('roomTypes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $roomTypes])


    </div>
@endsection