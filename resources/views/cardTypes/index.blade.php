@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">CardTypes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cardTypes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($cardTypes->isEmpty())
                <div class="well text-center">No CardTypes found.</div>
            @else
                @include('cardTypes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $cardTypes])


    </div>
@endsection