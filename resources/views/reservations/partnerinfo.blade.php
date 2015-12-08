<div class="panel panel-info">
    <div class="panel-heading">
        Partner Information
    </div>
    <div class="panel-body row">

        <div class="form-group form-group-sm row col-sm-12">
            <label for="reserve_date" class="col-sm-5 control-label">Date Booked</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" id="reserve_date" name="reserve_date" value="{{$reservation->reserve_date or ''}}">
            </div>
        </div>
        <div class="form-group form-group-sm row col-sm-12">
            <label for="partner" class="col-sm-5 control-label">Partner</label>
            <div class="col-sm-7">
                <select class="form-control" name="partner" id="partner">
                    <option></option>
                    @foreach($partners as $partner)
                        <option value="{{$partner->partner_name}}" @if($partner->partner_name == $reservation->Partner) selected @endif>
                            {{$partner->partner_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group form-group-sm row col-sm-12">
            <label for="booking_number" class="col-sm-5 control-label">Booking Number</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="booking_number" name="booking_number" value="{{$reservation->partnerTransactions->booking_number or ''}}">
            </div>
        </div>
        <div class="form-group form-group-sm row col-sm-12">
            <label for="commission" class="col-sm-5 control-label">Commission</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="commission" name="commission" value="{{$reservation->partnerTransactions->payable or ''}}">
            </div>
        </div>
        <div class="form-group form-group-sm row col-sm-12">
            <label for="discount" class="col-sm-5 control-label">discount</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="discount" name="discount" value="{{$reservation->partnerTransactions->discount or ''}}">
            </div>
        </div>
        <div class="form-group form-group-sm row col-sm-12">
            <label for="remarks" class="col-sm-5 control-label">Remarks</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="remarks" name="remarks" value="{{$reservation->partnerTransactions->remarks or ''}}">
            </div>
        </div>
    </div>
</div>
