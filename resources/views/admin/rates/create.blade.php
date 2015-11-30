@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'rates.store']) !!}

        @include('admin.rates.fields')

    {!! Form::close() !!}
</div>
@endsection
