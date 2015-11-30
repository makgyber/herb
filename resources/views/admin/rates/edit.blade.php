@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($rate, ['route' => ['rates.update', $rate->id], 'method' => 'patch']) !!}

        @include('admin.rates.fields')

    {!! Form::close() !!}
</div>
@endsection
