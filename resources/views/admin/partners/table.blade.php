<table class="table">
    <thead>
    <th>Partner Id</th>
			<th>Partner Name</th>
			<th>Remarks</th>
			<th>Active</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($partners as $partners)
        <tr>
            <td>{!! $partners->partner_id !!}</td>
			<td>{!! $partners->partner_name !!}</td>
			<td>{!! $partners->remarks !!}</td>
			<td>{!! $partners->active !!}</td>
            <td>
                <a href="{!! route('partners.edit', [$partners->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('partners.delete', [$partners->id]) !!}" onclick="return confirm('Are you sure wants to delete this Partners?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
