@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">PartnerTransactions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('partnerTransactions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($partnerTransactions->isEmpty())
                <div class="well text-center">No PartnerTransactions found.</div>
            @else
                @include('partnerTransactions.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $partnerTransactions])


    </div>
@endsection