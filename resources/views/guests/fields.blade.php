<!-- Guest Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('guest_id', 'Guest Id:') !!}
	{!! Form::number('guest_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('firstname', 'Firstname:') !!}
	{!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Middlename Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('middlename', 'Middlename:') !!}
	{!! Form::text('middlename', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('lastname', 'Lastname:') !!}
	{!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('address', 'Address:') !!}
	{!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('gender', 'Gender:') !!}
	{!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('birthday', 'Birthday:') !!}
	{!! Form::date('birthday', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Phone:') !!}
	{!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mobile', 'Mobile:') !!}
	{!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Nationality Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nationality', 'Nationality:') !!}
	{!! Form::text('nationality', null, ['class' => 'form-control']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('remarks', 'Remarks:') !!}
	{!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('company_name', 'Company Name:') !!}
	{!! Form::text('company_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Position Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('company_position', 'Company Position:') !!}
	{!! Form::text('company_position', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Address Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('company_address', 'Company Address:') !!}
	{!! Form::textarea('company_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('company_email', 'Company Email:') !!}
	{!! Form::text('company_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Phone Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('company_phone', 'Company Phone:') !!}
	{!! Form::text('company_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Mobile Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('company_mobile', 'Company Mobile:') !!}
	{!! Form::text('company_mobile', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
