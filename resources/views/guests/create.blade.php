@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'guests.store']) !!}

        @include('guests.fields')

    {!! Form::close() !!}
</div>
@endsection
