@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($roomTypes, ['route' => ['roomTypes.update', $roomTypes->id], 'method' => 'patch']) !!}

        @include('roomTypes.fields')

    {!! Form::close() !!}
</div>
@endsection
