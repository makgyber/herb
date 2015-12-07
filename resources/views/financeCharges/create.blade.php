@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'financeCharges.store']) !!}

        @include('financeCharges.fields')

    {!! Form::close() !!}
</div>
@endsection
