@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'floors.store']) !!}

        @include('admin.floors.fields')

    {!! Form::close() !!}
</div>
@endsection
