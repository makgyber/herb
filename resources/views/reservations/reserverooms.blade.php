<div class="panel panel-default">
    <div class="panel-heading">
        Add Rooms To Reservation
        <button class="btn btn-xs pull-right" id="removerooms"><span class="glyphicon glyphicon-trash"></span></button>
    </div>
    <table class="table">
        <thead>
        <tr><th>#</th><th>Room</th><th>In</th><th>Out</th></tr>
        </thead>
        <tbody id="rroomlist">
        <tr><td colspan="4">Select rooms to add</td></tr>
        </tbody>
    </table>
</div>
<div class="panel panel-default">
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
                <td>{{$reserveRoom->room_id}}</td>
                <td>{{$reserveRoom->checkin}}</td>
                <td>{{$reserveRoom->checkout}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>