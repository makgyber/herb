@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.rooms.store']) !!}

        @include('admin.rooms.fields')

    {!! Form::close() !!}
</div>
@endsection
