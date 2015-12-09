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
                <input type="hidden" name="rrooms" id="rrooms" />
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Reserved Rooms
                            <button class="btn btn-xs pull-right" id="removerooms" type="button">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </div>
                        <table class="table">
                            <thead>
                            <tr><th>#</th><th>Room</th><th>In</th><th>Out</th></tr>
                            </thead>
                            <tbody>
                            @foreach($reservation->reserveRooms as $reserveRoom)
                                <tr>
                                    <td><input type="checkbox" name="current_reserve_room" value="{{$reserveRoom->rr_id}}"></td>
                                    <td>{{$reserveRoom->room->door_name}}</td>
                                    <td>{{$reserveRoom->checkin}}</td>
                                    <td>{{$reserveRoom->checkout}}</td>
                                    <td>
                                        <button id="checkin" data-rrid="{{$reserveRoom->rr_id}}"
                                                data-roomid="{{$reserveRoom->room_id}}"
                                                type="button" class="checkin-icon btn btn-xs">
                                            <span class="glyphicon glyphicon-log-in"></span>
                                        </button>
                                        <button id="checkinclose" data-rrid="{{$reserveRoom->rr_id}}"
                                                data-roomid="{{$reserveRoom->room_id}}"
                                                type="button" class="checkin-icon btn btn-xs">
                                            <span class="glyphicon glyphicon-ok-circle"></span>
                                        </button>
                                        <button id="rrdel" data-rrid="{{$reserveRoom->rr_id}}" type="button" class="checkin-icon btn btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
