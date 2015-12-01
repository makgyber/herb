@extends('app')
@section('sidebar')
    <ul class="nav nav-sidebar">
        <li class="active"><a href="#">New</a></li>
        <li><a href="#">Reports</a></li>
    </ul>
@endsection

@section('content')
    <div class="well well-sm">
    <form class="form-inline" method="get">
        <div class="form-group">
            <label for="startdate">Arrival</label>
            <input type="date" class="form-control" id="startdate" name="startdate" value="{{$startdate}}">
        </div>

        <div class="form-group">
            <label for="enddate">Departure</label>
            <input type="date" class="form-control" id="enddate" name="enddate" value="{{$enddate}}">
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

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default Pending" data-status="Pending">
                    <input type="checkbox" autocomplete="off"> Pending
                </label>
                <label class="btn btn-default Claimed" data-status="Claimed">
                    <input type="checkbox" autocomplete="off"> Claimed
                </label>
                <label class="btn btn-default Cancelled" data-status="Cancelled">
                    <input type="checkbox" autocomplete="off"> Cancelled
                </label>
            </div>
        </div>
        <div class="panel-body">
            <table class="rescal">
                <thead>
                    <tr>
                        <th class="rm-col-hdr">Room</th>
                        @foreach($dates as $day)
                            <th>{!!  str_replace(' ', '<br>', $day) !!}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($calendar as $door => $cal)
                        <tr>
                            <th class="rm-col-cell">{{ $door }}</th>
                            @foreach($cal as $day => $reservation)
                                <td>
                                    @foreach($reservation as $rr)
                                        <div class="reserve {{$rr->status}} {{$rr->startmodifier}} {{$rr->endmodifier}}"
                                             data-rrid="{{$rr->rr_id}}"
                                             @if($rr->computedlength > 0 && $rr->startmodifier == 'extendleft' && $rr->endmodifier == 'extendright') style="width:{{ 100 * ((int) $rr->computedlength + 1) }}%"
                                             @elseif($rr->computedlength > 0 && $rr->startmodifier == '' && $rr->endmodifier == 'extendright') style="width:{{ 100 * ((int) $rr->computedlength + 0.5) }}%"
                                             @elseif($rr->computedlength > 0 && $rr->startmodifier == 'extendleft' && $rr->endmodifier == '') style="width:{{ 100 * ((int) $rr->computedlength + 0.5) }}%"
                                             @elseif($rr->computedlength > 0 && $rr->startmodifier == '' && $rr->endmodifier == '') style="width:{{ 100 * ((int) $rr->computedlength + 0) }}%"
                                                @endif
                                                >
                                            <span class="reserve_link">{{$rr->rr_id}}</span>
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
                        <tr><th>#</th><td id="rrid"></td></tr>
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
                    $('#rrid').html(resp.rr_id);
                    $('#myModal').modal('show');
                });
            });
            $('label.btn').on('click', function(e){
                e.preventDefault();
                var status = $(this).data('status');
                $('.reserve.' + status).toggle();
            })
        });
    </script>
@endsection