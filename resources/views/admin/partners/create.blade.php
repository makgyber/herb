@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'partners.store']) !!}

        @include('admin.partners.fields')

    {!! Form::close() !!}
</div>
@endsection
