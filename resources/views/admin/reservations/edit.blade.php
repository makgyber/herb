@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($reservation, ['route' => ['reservations.update', $reservation->id], 'method' => 'patch']) !!}

        @include('admin.reservations.fields')

    {!! Form::close() !!}
</div>
@endsection
