<!-- Card Type Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('card_type_id', 'Card Type Id:') !!}
	{!! Form::text('card_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('account_type', 'Account Type:') !!}
	<div class="radio-inline">
		<label>
			{!! Form::radio('account_type', 'debit', null) !!} Debit
		</label>
	</div>
	<div class="radio-inline">
		<label>
			{!! Form::radio('account_type', 'credit', null) !!} Credit
		</label>
	</div>
</div>

<!-- Charge Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('charge', 'Charge:') !!}
	{!! Form::text('charge', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
