<!-- Rr Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rr_id', 'Rr Id:') !!}
	{!! Form::number('rr_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Reserve Code Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('reserve_code', 'Reserve Code:') !!}
	{!! Form::text('reserve_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Type Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_type_id', 'Room Type Id:') !!}
	{!! Form::number('room_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_id', 'Room Id:') !!}
	{!! Form::number('room_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Checkin Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('checkin', 'Checkin:') !!}
	{!! Form::date('checkin', null, ['class' => 'form-control']) !!}
</div>

<!-- Checkout Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('checkout', 'Checkout:') !!}
	{!! Form::date('checkout', null, ['class' => 'form-control']) !!}
</div>

<!-- Deposit Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('deposit', 'Deposit:') !!}
	{!! Form::number('deposit', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status', 'Status:') !!}
	{!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
