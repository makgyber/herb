@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Reservations</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('reservations.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($reservations->isEmpty())
                <div class="well text-center">No Reservations found.</div>
            @else
                @include('admin.reservations.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $reservations])


    </div>
@endsection