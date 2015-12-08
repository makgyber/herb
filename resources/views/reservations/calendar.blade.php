<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form" method="get" id="calendarform">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-sm">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-log-in" title="CHECK IN"></span>
                            </span>
                            <input type="date" class="form-control" id="startdate" name="startdate" value="{{$startdate}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-log-out"  title="CHECK OUT"></span></span>
                            <input type="date" class="form-control" id="enddate" name="enddate" value="{{$enddate}}">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-home" title="ROOM TYPE"></span>
                            </span>
                            <select name="room_type_id" id="room_type_id" class="form-control">
                                @foreach($roomTypes as $roomType)
                                    <option value="{{$roomType->room_type_id}}"
                                            @if(old('room_type_id') == $roomType->room_type_id) selected @endif>
                                        {{$roomType->room_type_name}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default" id="calsubmit">
                                    <span class="glyphicon glyphicon-calendar" title="REFRESH CALENDAR"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group btn-group-xs" data-toggle="buttons" >
                        <label class="btn btn-default Pending" data-status="Pending" title="Click to hide/show all Pending reservations">
                            <input type="checkbox" autocomplete="off"> Pending
                        </label>
                        <label class="btn btn-default Claimed" data-status="Claimed" title="Click to hide/show all Claimed reservations">
                            <input type="checkbox" autocomplete="off"> Claimed
                        </label>
                        <label class="btn btn-default Cancelled" data-status="Cancelled" title="Click to hide/show all Cancelled reservations">
                            <input type="checkbox" autocomplete="off"> Cancelled
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="panel-body" style="overflow: auto">
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

                <tr class="rm-row">
                    <td class="rm-col-cell">{{ $door }}</td>
                    @foreach($cal as $day => $reservation)
                        <td>
                            <div class="btn btn-block btn-default reserve-btn btn-xs"
                                 data-door="{{ $door }}" data-day="{{ $day }}"
                                    >
                                <span class="glyphicon glyphicon-bed"></span>
                            </div>
                            @foreach($reservation as $rr)
                                <div class="reserve {{$rr->status}} {{$rr->startmodifier}} {{$rr->endmodifier}}"
                                     data-rrid="{{$rr->rr_id}}" data-reserve="{{$rr->reserve_code}}"
                                     @if($rr->computedlength > 0 && $rr->startmodifier == 'extendleft' && $rr->endmodifier == 'extendright') style="width:{{ 100 * ((int) $rr->computedlength + 1) }}%"
                                     @elseif($rr->computedlength > 0 && $rr->startmodifier == '' && $rr->endmodifier == 'extendright') style="width:{{ 100 * ((int) $rr->computedlength + 0.5) }}%"
                                     @elseif($rr->computedlength > 0 && $rr->startmodifier == 'extendleft' && $rr->endmodifier == '') style="width:{{ 100 * ((int) $rr->computedlength + 0.5) }}%"
                                     @elseif($rr->computedlength > 0 && $rr->startmodifier == '' && $rr->endmodifier == '') style="width:{{ 100 * ((int) $rr->computedlength + 0) }}%"
                                        @endif
                                        >
                                    {{$rr->rr_id}}
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
<script>
    $(document).ready(function(){
        $('#calsubmit').on('click', function(e){
            e.preventDefault();
            reloadPageWithParameters($('#reserve_code').val());
        });
    });
</script>
