@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'occupancies.store']) !!}

        @include('admin.occupancies.fields')

    {!! Form::close() !!}
</div>
@endsection
