<!-- Room Type Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_type_id', 'Room Type Id:') !!}
	{!! Form::number('room_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Type Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_type_name', 'Room Type Name:') !!}
	{!! Form::text('room_type_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Site Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('site_id', 'Site Id:') !!}
	{!! Form::number('site_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Rank Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rank', 'Rank:') !!}
	{!! Form::number('rank', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
