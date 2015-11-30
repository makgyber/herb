@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'roomTypes.store']) !!}

        @include('roomTypes.fields')

    {!! Form::close() !!}
</div>
@endsection
