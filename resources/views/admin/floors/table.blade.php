<table class="table">
    <thead>
    <th>Floor Id</th>
			<th>Site Id</th>
			<th>Floor Label</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($floors as $floor)
        <tr>
            <td>{!! $floor->floor_id !!}</td>
			<td>{!! $floor->site_id !!}</td>
			<td>{!! $floor->floor_label !!}</td>
            <td>
                <a href="{!! route('floors.edit', [$floor->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('floors.delete', [$floor->id]) !!}" onclick="return confirm('Are you sure wants to delete this Floor?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
