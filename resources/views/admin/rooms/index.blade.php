@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Rooms</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.rooms.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($rooms->isEmpty())
                <div class="well text-center">No Rooms found.</div>
            @else
                @include('admin.rooms.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $rooms])


    </div>
@endsection