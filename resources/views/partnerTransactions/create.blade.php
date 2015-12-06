@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'partnerTransactions.store']) !!}

        @include('partnerTransactions.fields')

    {!! Form::close() !!}
</div>
@endsection
