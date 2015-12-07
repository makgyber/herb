@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($cardType, ['route' => ['cardTypes.update', $cardType->id], 'method' => 'patch']) !!}

        @include('cardTypes.fields')

    {!! Form::close() !!}
</div>
@endsection
