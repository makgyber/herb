@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($bookingRoomTypes, ['route' => ['bookingRoomTypes.update', $bookingRoomTypes->id], 'method' => 'patch']) !!}

        @include('bookingRoomTypes.fields')

    {!! Form::close() !!}
</div>
@endsection
