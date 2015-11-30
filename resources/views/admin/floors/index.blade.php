@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Floors</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('floors.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($floors->isEmpty())
                <div class="well text-center">No Floors found.</div>
            @else
                @include('admin.floors.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $floors])


    </div>
@endsection