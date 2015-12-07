@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($financeCharge, ['route' => ['financeCharges.update', $financeCharge->id], 'method' => 'patch']) !!}

        @include('financeCharges.fields')

    {!! Form::close() !!}
</div>
@endsection
