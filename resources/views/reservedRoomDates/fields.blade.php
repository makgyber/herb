<!-- Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id', 'Id:') !!}
	{!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Reserve Room Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('reserve_room_id', 'Reserve Room Id:') !!}
	{!! Form::number('reserve_room_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('room_id', 'Room Id:') !!}
	{!! Form::number('room_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cal Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('cal_date', 'Cal Date:') !!}
	{!! Form::date('cal_date', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
