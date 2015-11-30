@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($discount, ['route' => ['discounts.update', $discount->id], 'method' => 'patch']) !!}

        @include('admin.discounts.fields')

    {!! Form::close() !!}
</div>
@endsection
