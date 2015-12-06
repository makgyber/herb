@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'occupancyRooms.store']) !!}

        @include('occupancyRooms.fields')

    {!! Form::close() !!}
</div>
@endsection
