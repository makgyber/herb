<!-- Pt Id Field -->
<div class="form-group">
    {!! Form::label('pt_id', 'Pt Id:') !!}
    <p>{!! $partnerTransaction->pt_id !!}</p>
</div>

<!-- Transaction Date Field -->
<div class="form-group">
    {!! Form::label('transaction_date', 'Transaction Date:') !!}
    <p>{!! $partnerTransaction->transaction_date !!}</p>
</div>

<!-- Reserve Code Field -->
<div class="form-group">
    {!! Form::label('reserve_code', 'Reserve Code:') !!}
    <p>{!! $partnerTransaction->reserve_code !!}</p>
</div>

<!-- Booking Number Field -->
<div class="form-group">
    {!! Form::label('booking_number', 'Booking Number:') !!}
    <p>{!! $partnerTransaction->booking_number !!}</p>
</div>

<!-- Partner Name Field -->
<div class="form-group">
    {!! Form::label('partner_name', 'Partner Name:') !!}
    <p>{!! $partnerTransaction->partner_name !!}</p>
</div>

<!-- Recievable Field -->
<div class="form-group">
    {!! Form::label('recievable', 'Recievable:') !!}
    <p>{!! $partnerTransaction->recievable !!}</p>
</div>

<!-- Payable Field -->
<div class="form-group">
    {!! Form::label('payable', 'Payable:') !!}
    <p>{!! $partnerTransaction->payable !!}</p>
</div>

<!-- Remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{!! $partnerTransaction->remarks !!}</p>
</div>

<!-- Result Status Field -->
<div class="form-group">
    {!! Form::label('result_status', 'Result Status:') !!}
    <p>{!! $partnerTransaction->result_status !!}</p>
</div>

