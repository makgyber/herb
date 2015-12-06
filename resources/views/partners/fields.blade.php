<!-- Partner Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('partner_id', 'Partner Id:') !!}
	{!! Form::number('partner_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Partner Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('partner_name', 'Partner Name:') !!}
	{!! Form::text('partner_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('remarks', 'Remarks:') !!}
	{!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('active', 'Active:') !!}
	{!! Form::number('active', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
