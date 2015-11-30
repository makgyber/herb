<table class="table">
    <thead>
    <th>Room Type Id</th>
			<th>Room Type Name</th>
			<th>Site Id</th>
			<th>Rank</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($roomTypes as $roomTypes)
        <tr>
            <td>{!! $roomTypes->room_type_id !!}</td>
			<td>{!! $roomTypes->room_type_name !!}</td>
			<td>{!! $roomTypes->site_id !!}</td>
			<td>{!! $roomTypes->rank !!}</td>
            <td>
                <a href="{!! route('roomTypes.edit', [$roomTypes->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('roomTypes.delete', [$roomTypes->id]) !!}" onclick="return confirm('Are you sure wants to delete this RoomTypes?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
