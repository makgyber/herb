@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'reservations.store']) !!}

        @include('admin.reservations.fields')

    {!! Form::close() !!}
</div>
@endsection
