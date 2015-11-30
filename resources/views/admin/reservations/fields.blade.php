<!-- Reserve Code Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('reserve_code', 'Reserve Code:') !!}
	{!! Form::text('reserve_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Original Amount Paid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('original_amount_paid', 'Original Amount Paid:') !!}
	{!! Form::number('original_amount_paid', null, ['class' => 'form-control']) !!}
</div>

<!-- Guest Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('guest_id', 'Guest Id:') !!}
	{!! Form::number('guest_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Reserve Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('reserve_date', 'Reserve Date:') !!}
	{!! Form::date('reserve_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Pax Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pax', 'Pax:') !!}
	{!! Form::number('pax', null, ['class' => 'form-control']) !!}
</div>

<!-- Reserve Fee Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('reserve_fee', 'Reserve Fee:') !!}
	{!! Form::number('reserve_fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('payment_type', 'Payment Type:') !!}
	{!! Form::text('payment_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('notes', 'Notes:') !!}
	{!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status', 'Status:') !!}
	{!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Pickup Time Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pickup_time', 'Pickup Time:') !!}
	{!! Form::text('pickup_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Pickup Location Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pickup_location', 'Pickup Location:') !!}
	{!! Form::text('pickup_location', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Created Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date_created', 'Date Created:') !!}
	{!! Form::date('date_created', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('created_by', 'Created By:') !!}
	{!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Updated Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date_updated', 'Date Updated:') !!}
	{!! Form::date('date_updated', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('updated_by', 'Updated By:') !!}
	{!! Form::number('updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Partner Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Partner', 'Partner:') !!}
	{!! Form::text('Partner', null, ['class' => 'form-control']) !!}
</div>

<!-- Card Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('card_type', 'Card Type:') !!}
	{!! Form::text('card_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Approval Code Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('approval_code', 'Approval Code:') !!}
	{!! Form::text('approval_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Batch Number Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('batch_number', 'Batch Number:') !!}
	{!! Form::text('batch_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Debit Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('is_debit', 'Is Debit:') !!}
	{!! Form::number('is_debit', null, ['class' => 'form-control']) !!}
</div>

<!-- Card Suffix Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('card_suffix', 'Card Suffix:') !!}
	{!! Form::text('card_suffix', null, ['class' => 'form-control']) !!}
</div>

<!-- Multi Entry Approver Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('multi_entry_approver', 'Multi Entry Approver:') !!}
	{!! Form::text('multi_entry_approver', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
