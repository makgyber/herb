<table class="table">
    <thead>
    <th>Id</th>
			<th>Reserve Room Id</th>
			<th>Room Id</th>
			<th>Cal Date</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($reservedRoomDates as $reservedRoomDate)
        <tr>
            <td>{!! $reservedRoomDate->id !!}</td>
			<td>{!! $reservedRoomDate->reserve_room_id !!}</td>
			<td>{!! $reservedRoomDate->room_id !!}</td>
			<td>{!! $reservedRoomDate->cal_date !!}</td>
            <td>
                <a href="{!! route('reservedRoomDates.edit', [$reservedRoomDate->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('reservedRoomDates.delete', [$reservedRoomDate->id]) !!}" onclick="return confirm('Are you sure wants to delete this ReservedRoomDate?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
