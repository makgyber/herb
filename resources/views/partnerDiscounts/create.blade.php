@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'partnerDiscounts.store']) !!}

        @include('partnerDiscounts.fields')

    {!! Form::close() !!}
</div>
@endsection
