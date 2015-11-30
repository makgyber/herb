<!-- Rate Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rate_id', 'Rate Id:') !!}
	{!! Form::number('rate_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rate_name', 'Rate Name:') !!}
	{!! Form::text('rate_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Hour Start Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('hour_start', 'Hour Start:') !!}
	{!! Form::number('hour_start', null, ['class' => 'form-control']) !!}
</div>

<!-- Hour End Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('hour_end', 'Hour End:') !!}
	{!! Form::number('hour_end', null, ['class' => 'form-control']) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('duration', 'Duration:') !!}
	{!! Form::number('duration', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
