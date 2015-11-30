@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'discounts.store']) !!}

        @include('admin.discounts.fields')

    {!! Form::close() !!}
</div>
@endsection
