@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($reserveRoom, ['route' => ['reserveRooms.update', $reserveRoom->id], 'method' => 'patch']) !!}

        @include('reserveRooms.fields')

    {!! Form::close() !!}
</div>
@endsection
