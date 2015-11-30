<table class="table">
    <thead>
    <th>Rr Id</th>
			<th>Reserve Code</th>
			<th>Room Type Id</th>
			<th>Room Id</th>
			<th>Checkin</th>
			<th>Checkout</th>
			<th>Deposit</th>
			<th>Status</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($reserveRooms as $reserveRoom)
        <tr>
            <td>{!! $reserveRoom->rr_id !!}</td>
			<td>{!! $reserveRoom->reserve_code !!}</td>
			<td>{!! $reserveRoom->room_type_id !!}</td>
			<td>{!! $reserveRoom->room_id !!}</td>
			<td>{!! $reserveRoom->checkin !!}</td>
			<td>{!! $reserveRoom->checkout !!}</td>
			<td>{!! $reserveRoom->deposit !!}</td>
			<td>{!! $reserveRoom->status !!}</td>
            <td>
                <a href="{!! route('reserveRooms.edit', [$reserveRoom->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('reserveRooms.delete', [$reserveRoom->id]) !!}" onclick="return confirm('Are you sure wants to delete this ReserveRoom?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
