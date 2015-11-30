@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($reservedRoomDate, ['route' => ['reservedRoomDates.update', $reservedRoomDate->id], 'method' => 'patch']) !!}

        @include('reservedRoomDates.fields')

    {!! Form::close() !!}
</div>
@endsection
