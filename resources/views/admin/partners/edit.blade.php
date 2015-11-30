@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($partners, ['route' => ['partners.update', $partners->id], 'method' => 'patch']) !!}

        @include('admin.partners.fields')

    {!! Form::close() !!}
</div>
@endsection
