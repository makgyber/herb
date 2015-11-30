@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'reserveRooms.store']) !!}

        @include('reserveRooms.fields')

    {!! Form::close() !!}
</div>
@endsection
