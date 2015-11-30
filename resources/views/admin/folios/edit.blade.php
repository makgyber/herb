@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($folio, ['route' => ['folios.update', $folio->id], 'method' => 'patch']) !!}

        @include('admin.folios.fields')

    {!! Form::close() !!}
</div>
@endsection
