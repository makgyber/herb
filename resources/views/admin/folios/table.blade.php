<table class="table">
    <thead>
    <th>Id</th>
			<th>Created By</th>
			<th>Updated By</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Active</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($folios as $folio)
        <tr>
            <td>{!! $folio->id !!}</td>
			<td>{!! $folio->created_by !!}</td>
			<td>{!! $folio->updated_by !!}</td>
			<td>{!! $folio->created_at !!}</td>
			<td>{!! $folio->updated_at !!}</td>
			<td>{!! $folio->active !!}</td>
            <td>
                <a href="{!! route('folios.edit', [$folio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('folios.delete', [$folio->id]) !!}" onclick="return confirm('Are you sure wants to delete this Folio?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
