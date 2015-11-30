@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($room, ['route' => ['admin.rooms.update', $room->id], 'method' => 'patch']) !!}

        @include('admin.rooms.fields')

    {!! Form::close() !!}
</div>
@endsection
