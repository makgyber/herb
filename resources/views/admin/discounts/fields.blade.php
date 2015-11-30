<!-- Discount Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('discount_id', 'Discount Id:') !!}
	{!! Form::number('discount_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Label Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('discount_label', 'Discount Label:') !!}
	{!! Form::text('discount_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('discount_type', 'Discount Type:') !!}
	{!! Form::text('discount_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Percent Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('discount_percent', 'Discount Percent:') !!}
	{!! Form::number('discount_percent', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
