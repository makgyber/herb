@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'reservedRoomDates.store']) !!}

        @include('reservedRoomDates.fields')

    {!! Form::close() !!}
</div>
@endsection
