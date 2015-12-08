<div class="panel panel-success">
    <div class="panel-heading">
        Particulars
    </div>
    <div class="panel-body row">
        <div class="form form-horizontal">
            <div class="form-group form-group-sm col-sm-12">
                <label for="inputPassword" class="col-sm-6 control-label">Status</label>
                <div class="col-sm-6">{{$reservation->status or ''}}</div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="inputPassword" class="col-sm-5 control-label">No. of Pax</label>
                <div class="col-sm-7">
                    <input type="number" class="form-control"  name="pax" id="pax" placeholder="No. of Pax" value="{{$reservation->pax or ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="pickup_time" class="col-sm-5 control-label">Pickup Time</label>
                <div class="col-sm-7">
                    <input type="time" class="form-control" name="pickup_time" id="pickup_time" placeholder="Pickup Time" value="{{$reservation->pickup_time or ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="pickup_location" class="col-sm-5 control-label">Location</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="pickup_location" id="pickup_location" placeholder="Location" value="{{$reservation->pickup_location or ''}}">
                </div>
            </div>
            <div class="form-group form-group-sm row col-sm-12">
                <label for="notes" class="col-sm-5 control-label">Notes</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="notes" id="notes">{{$reservation->notes or ''}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>