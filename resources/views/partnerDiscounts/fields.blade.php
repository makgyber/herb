<!-- Id Field -->
{{--<div class="form-group col-sm-6 col-lg-4">--}}
    {{--{!! Form::label('id', 'Id:') !!}--}}
	{{--{!! Form::number('id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Partner Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('partner_id', 'Partner Id:') !!}
    {!! Form::select('partner_id', $partners, null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('discount', 'Discount:') !!}
	{!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('remarks', 'Remarks:') !!}
	{!! Form::text('remarks', null, ['class' => 'form-control']) !!}
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
