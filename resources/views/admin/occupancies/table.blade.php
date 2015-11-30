<table class="table">
    <thead>
    <th>Occupancy Id</th>
			<th>Actual Checkin</th>
			<th>Expected Checkout</th>
			<th>Actual Checkout</th>
			<th>Shift Checkin</th>
			<th>Room Id</th>
			<th>Rate Id</th>
			<th>Update By</th>
			<th>Wakeup</th>
			<th>Isalerted</th>
			<th>Regflag</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($occupancies as $occupancy)
        <tr>
            <td>{!! $occupancy->occupancy_id !!}</td>
			<td>{!! $occupancy->actual_checkin !!}</td>
			<td>{!! $occupancy->expected_checkout !!}</td>
			<td>{!! $occupancy->actual_checkout !!}</td>
			<td>{!! $occupancy->shift_checkin !!}</td>
			<td>{!! $occupancy->room_id !!}</td>
			<td>{!! $occupancy->rate_id !!}</td>
			<td>{!! $occupancy->update_by !!}</td>
			<td>{!! $occupancy->wakeup !!}</td>
			<td>{!! $occupancy->isalerted !!}</td>
			<td>{!! $occupancy->regflag !!}</td>
            <td>
                <a href="{!! route('occupancies.edit', [$occupancy->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('occupancies.delete', [$occupancy->id]) !!}" onclick="return confirm('Are you sure wants to delete this Occupancy?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
