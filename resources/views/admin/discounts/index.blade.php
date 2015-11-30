@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Discounts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('discounts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($discounts->isEmpty())
                <div class="well text-center">No Discounts found.</div>
            @else
                @include('admin.discounts.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $discounts])


    </div>
@endsection