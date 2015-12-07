@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($partnerDiscount, ['route' => ['partnerDiscounts.update', $partnerDiscount->id], 'method' => 'patch']) !!}

        @include('partnerDiscounts.fields')

    {!! Form::close() !!}
</div>
@endsection
