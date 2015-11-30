@extends('app')
@section('sidebar')
    <ul class="nav nav-sidebar">
        <li class="active"><a href="#">New</a></li>
        <li><a href="#">Reports</a></li>
    </ul>
@endsection

@section('content')
    <style>
        .calendar th {
            background-color: #cccccc;
            text-align: center;
        }
        .calendar td {
            vertical-align: top;
            position:relative;
            padding: 4px 0;
        }
        .calendar td div {
            font-size: 10px;
            padding: 3px;
            width: 100%;
            margin-top: 2px;
        }
        .i {
            width: 50%;
            -webkit-border-top-left-radius: 6px;
            -webkit-border-bottom-left-radius: 6px;
            -moz-border-radius-topleft: 6px;
            -moz-border-radius-bottomleft: 6px;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            margin-left: 50%;
        }
        .o {
            width: 50%;
            margin-right: 50%;
            -webkit-border-top-right-radius: 6px;
            -webkit-border-bottom-right-radius: 6px;
            -moz-border-radius-topright: 6px;
            -moz-border-radius-bottomright: 6px;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }
        .Pending {background-color: #f2dede}
        .Cancelled {background-color: #ffdd88}
        .Claimed {background-color: #3c763d}

        .reserve {
            cursor: pointer;
        }

    </style>
    <div class="well well-sm">
    <form class="form-inline" method="get">
        <div class="form-group">
            <label for="startdate">Arrival</label>
            <input type="date" class="form-control" id="startdate" name="startdate" value="{{old('startdate')}}">
        </div>

        <div class="form-group">
            <label for="enddate">Departure</label>
            <input type="date" class="form-control" id="enddate" name="enddate" value="{{old('enddate')}}">
        </div>

        <div class="form-group">
            <label for="enddate">Room Type</label>
            <select name="room_type_id" class="form-control">
                @foreach($roomTypes as $roomType)
                <option value="{{$roomType->room_type_id}}"
                        @if(old('room_type_id') == $roomType->room_type_id) selected @endif>
                    {{$roomType->room_type_name}}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-default">Go</button>
    </form>
    </div>

    <div class="panel">
        <div class="panel-body">
            <table class="table-bordered calendar">
                <thead>
                    <tr>
                        <th>Room No.</th>
                        @foreach($dates as $day)
                            <th colspan="1">{!!  str_replace(' ', '<br>', $day) !!}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($calendar as $door => $cal)
                        <tr>
                            <td>{{ $door }}</td>
                            @foreach($cal as $day => $reservation)
                                <td>
                                    @foreach($reservation as $rr)
                                        <div class="reserve {{$rr->status}} {{$rr->modifier}}" data-rrid="{{$rr->reserve_room_id}}">
                                            {{$rr->reserve_room_id}}
                                        </div>
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr><th>Check In</th><td id="checkin"></td></tr>
                        <tr><th>Check Out</th><td id="checkout"></td></tr>
                        <tr><th>Deposit</th><td id="deposit"></td></tr>
                        <tr><th>Status</th><td id="status"></td></tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Edit Details</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("#clock").jclock({foreground:'yellow',background:'green',fontSize:'20px',timeNotation:'24h'});
            $('.reserve').on('click', function(e){
                e.preventDefault();
                var url = '{{ url('api/v1/reservation/detail') }}' + '/' + $(this).data('rrid');
                $.get(url, function(resp){
                    $('#myModalLabel').html('Reservation Code: ' + resp.reserve_code);
                    $('#checkin').html(resp.checkin);
                    $('#checkout').html(resp.checkout);
                    $('#deposit').html(resp.deposit);
                    $('#status').html(resp.status);
                    $('#myModal').modal('show');
                });
            });
        });
    </script>
@endsection