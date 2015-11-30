@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'folios.store']) !!}

        @include('admin.folios.fields')

    {!! Form::close() !!}
</div>
@endsection
