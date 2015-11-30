<!-- Occupancy Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('occupancy_id', 'Occupancy Id:') !!}
	{!! Form::number('occupancy_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Actual Checkin Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('actual_checkin', 'Actual Checkin:') !!}
	{!! Form::date('actual_checkin', null, ['class' => 'form-control']) !!}
</div>

<!-- Expected Checkout Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('expected_checkout', 'Expected Checkout:') !!}
	{!! Form::date('expected_checkout', null, ['class' => 'form-control']) !!}
</div>

<!-- Actual Checkout Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('actual_checkout', 'Actual Checkout:') !!}
	{!! Form::date('actual_checkout', null, ['class' => 'form-control']) !!}
</div>

<!-- Shift Checkin Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('shift_checkin', 'Shift Checkin:') !!}
	{!! Form::number('shift_checkin', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_id', 'Room Id:') !!}
	{!! Form::number('room_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rate_id', 'Rate Id:') !!}
	{!! Form::number('rate_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Update By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('update_by', 'Update By:') !!}
	{!! Form::number('update_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Wakeup Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('wakeup', 'Wakeup:') !!}
	{!! Form::text('wakeup', null, ['class' => 'form-control']) !!}
</div>

<!-- Isalerted Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('isalerted', 'Isalerted:') !!}
	{!! Form::text('isalerted', null, ['class' => 'form-control']) !!}
</div>

<!-- Regflag Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('regflag', 'Regflag:') !!}
	{!! Form::number('regflag', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
