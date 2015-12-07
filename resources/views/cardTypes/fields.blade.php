<!-- Id Field -->
{{--<div class="form-group col-sm-6 col-lg-4">--}}
    {{--{!! Form::label('id', 'Id:') !!}--}}
	{{--{!! Form::number('id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
{{--<div class="form-group col-sm-6 col-lg-4">--}}
    {{--{!! Form::label('created_at', 'Created At:') !!}--}}
	{{--{!! Form::date('created_at', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Updated At Field -->
{{--<div class="form-group col-sm-6 col-lg-4">--}}
    {{--{!! Form::label('updated_at', 'Updated At:') !!}--}}
	{{--{!! Form::date('updated_at', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
