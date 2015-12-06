<table class="table">
    <thead>
    <th>Partner Id</th>
			<th>Partner Name</th>
			<th>Remarks</th>
			<th>Active</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($partners as $partner)
        <tr>
            <td>{!! $partner->partner_id !!}</td>
			<td>{!! $partner->partner_name !!}</td>
			<td>{!! $partner->remarks !!}</td>
			<td>{!! $partner->active !!}</td>
            <td>
                <a href="{!! route('partners.edit', [$partner->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('partners.delete', [$partner->id]) !!}" onclick="return confirm('Are you sure wants to delete this Partner?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
