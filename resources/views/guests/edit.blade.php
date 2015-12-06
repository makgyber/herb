@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($guest, ['route' => ['guests.update', $guest->id], 'method' => 'patch']) !!}

        @include('guests.fields')

    {!! Form::close() !!}
</div>
@endsection
