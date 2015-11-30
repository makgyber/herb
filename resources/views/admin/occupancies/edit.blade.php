@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($occupancy, ['route' => ['occupancies.update', $occupancy->id], 'method' => 'patch']) !!}

        @include('admin.occupancies.fields')

    {!! Form::close() !!}
</div>
@endsection
