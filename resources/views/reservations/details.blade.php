<form class="form form-horizontal" method="post" id="reserveform" name="reserveform" action="{{url('reservations/save')}}">
    <div class="panel panel-primary reserve-details">
        <div class="panel-heading form-inline">

                <label for="reserve_code">Reservation Code</label>
                <div class="input-group input-group-sm">
                    <input type="text" name="reserve_code" class="form-control" id="reserve_code" value="{{$reservation->reserve_code or ''}}" />
                    <span class="input-group-btn">
                        <button type="button" class="resform-btn btn btn-default" id="search"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
                <button class="btn btn-default btn-sm resform-btn" id="new" type="button">New</button>
                <button class="btn btn-default btn-sm resform-btn" id="save" type="submit">Save</button>
                <button class="btn btn-default btn-sm resform-btn" id="print" type="submit">Print</button>
                <button class="btn btn-default btn-sm resform-btn" id="cancel" type="submit">Cancel</button>

        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    @include('reservations.reserverooms')
                    @include('reservations.guestinfo')
                    @include('reservations.partnerinfo')
                </div>
                <div class="col-md-6">
                    @include('reservations.particulars')
                    @include('reservations.deposit')
                </div>
            </div>
        </div>
    </div>
</form>
