<table class="table">
    <thead>
    <th>Room Id</th>
			<th>Door Name</th>
			<th>Site Id</th>
			<th>Floor Id</th>
			<th>Room Type Id</th>
			<th>Theme Id</th>
			<th>Ui Top</th>
			<th>Ui Left</th>
			<th>Ui Width</th>
			<th>Ui Height</th>
			<th>Status</th>
			<th>Last Update</th>
			<th>Update By</th>
			<th>Website</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{!! $room->room_id !!}</td>
			<td>{!! $room->door_name !!}</td>
			<td>{!! $room->site_id !!}</td>
			<td>{!! $room->floor_id !!}</td>
			<td>{!! $room->room_type_id !!}</td>
			<td>{!! $room->theme_id !!}</td>
			<td>{!! $room->ui_top !!}</td>
			<td>{!! $room->ui_left !!}</td>
			<td>{!! $room->ui_width !!}</td>
			<td>{!! $room->ui_height !!}</td>
			<td>{!! $room->status !!}</td>
			<td>{!! $room->last_update !!}</td>
			<td>{!! $room->update_by !!}</td>
			<td>{!! $room->website !!}</td>
            <td>
                <a href="{!! route('admin.rooms.edit', [$room->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('admin.rooms.delete', [$room->id]) !!}" onclick="return confirm('Are you sure wants to delete this Room?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
