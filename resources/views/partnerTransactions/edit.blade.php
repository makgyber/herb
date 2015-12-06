@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($partnerTransaction, ['route' => ['partnerTransactions.update', $partnerTransaction->id], 'method' => 'patch']) !!}

        @include('partnerTransactions.fields')

    {!! Form::close() !!}
</div>
@endsection
