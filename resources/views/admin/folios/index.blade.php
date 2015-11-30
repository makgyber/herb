@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Folios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('folios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($folios->isEmpty())
                <div class="well text-center">No Folios found.</div>
            @else
                @include('admin.folios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $folios])


    </div>
@endsection