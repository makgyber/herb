@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($floor, ['route' => ['floors.update', $floor->id], 'method' => 'patch']) !!}

        @include('admin.floors.fields')

    {!! Form::close() !!}
</div>
@endsection
