@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">PartnerDiscounts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('partnerDiscounts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($partnerDiscounts->isEmpty())
                <div class="well text-center">No PartnerDiscounts found.</div>
            @else
                @include('partnerDiscounts.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $partnerDiscounts])


    </div>
@endsection