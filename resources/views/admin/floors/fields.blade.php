<!-- Floor Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('floor_id', 'Floor Id:') !!}
	{!! Form::number('floor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Site Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('site_id', 'Site Id:') !!}
	{!! Form::number('site_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Floor Label Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('floor_label', 'Floor Label:') !!}
	{!! Form::text('floor_label', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
