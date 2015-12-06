<!-- Pt Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pt_id', 'Pt Id:') !!}
	{!! Form::number('pt_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('transaction_date', 'Transaction Date:') !!}
	{!! Form::date('transaction_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Reserve Code Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('reserve_code', 'Reserve Code:') !!}
	{!! Form::text('reserve_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Booking Number Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('booking_number', 'Booking Number:') !!}
	{!! Form::text('booking_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Partner Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('partner_name', 'Partner Name:') !!}
	{!! Form::text('partner_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Recievable Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('recievable', 'Recievable:') !!}
	{!! Form::number('recievable', null, ['class' => 'form-control']) !!}
</div>

<!-- Payable Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('payable', 'Payable:') !!}
	{!! Form::number('payable', null, ['class' => 'form-control']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('remarks', 'Remarks:') !!}
	{!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
</div>

<!-- Result Status Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('result_status', 'Result Status:') !!}
	{!! Form::text('result_status', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
