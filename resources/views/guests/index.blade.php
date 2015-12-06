@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Guests</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('guests.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($guests->isEmpty())
                <div class="well text-center">No Guests found.</div>
            @else
                @include('guests.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $guests])


    </div>
@endsection