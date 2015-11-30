@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'bookingRoomTypes.store']) !!}

        @include('bookingRoomTypes.fields')

    {!! Form::close() !!}
</div>
@endsection
