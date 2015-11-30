<!-- Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id', 'Id:') !!}
	{!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('created_by', 'Created By:') !!}
	{!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('updated_by', 'Updated By:') !!}
	{!! Form::text('updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('created_at', 'Created At:') !!}
	{!! Form::date('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('updated_at', 'Updated At:') !!}
	{!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('active', 'Active:') !!}
	{!! Form::text('active', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
