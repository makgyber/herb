<!-- Room Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_id', 'Room Id:') !!}
	{!! Form::number('room_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Door Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('door_name', 'Door Name:') !!}
	{!! Form::text('door_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Site Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('site_id', 'Site Id:') !!}
	{!! Form::number('site_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Floor Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('floor_id', 'Floor Id:') !!}
	{!! Form::number('floor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Type Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_type_id', 'Room Type Id:') !!}
	{!! Form::number('room_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Theme Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('theme_id', 'Theme Id:') !!}
	{!! Form::number('theme_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ui Top Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ui_top', 'Ui Top:') !!}
	{!! Form::number('ui_top', null, ['class' => 'form-control']) !!}
</div>

<!-- Ui Left Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ui_left', 'Ui Left:') !!}
	{!! Form::number('ui_left', null, ['class' => 'form-control']) !!}
</div>

<!-- Ui Width Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ui_width', 'Ui Width:') !!}
	{!! Form::number('ui_width', null, ['class' => 'form-control']) !!}
</div>

<!-- Ui Height Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ui_height', 'Ui Height:') !!}
	{!! Form::number('ui_height', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status', 'Status:') !!}
	{!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Update Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_update', 'Last Update:') !!}
	{!! Form::date('last_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Update By Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('update_by', 'Update By:') !!}
	{!! Form::number('update_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('website', 'Website:') !!}
	{!! Form::number('website', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
