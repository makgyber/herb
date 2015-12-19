<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $partnerDiscount->partner->partner_name !!}</p>
</div>

<!-- Partner Id Field -->
<div class="form-group">
    {!! Form::label('partner_id', 'Partner Id:') !!}
    <p>{!! $partnerDiscount->partner_id !!}</p>
</div>

<!-- Discount Field -->
<div class="form-group">
    {!! Form::label('discount', 'Discount:') !!}
    <p>{!! $partnerDiscount->discount !!}</p>
</div>

<!-- Remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{!! $partnerDiscount->remarks !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $partnerDiscount->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $partnerDiscount->updated_at !!}</p>
</div>

