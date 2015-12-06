@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($occupancyRoom, ['route' => ['occupancyRooms.update', $occupancyRoom->id], 'method' => 'patch']) !!}

        @include('occupancyRooms.fields')

    {!! Form::close() !!}
</div>
@endsection
