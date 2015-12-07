<table class="table">
    <thead>
    <th>Id</th>
			<th>Name</th>
			<th>Created At</th>
			<th>Updated At</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($cardTypes as $cardType)
        <tr>
            <td>{!! $cardType->id !!}</td>
			<td>{!! $cardType->name !!}</td>
			<td>{!! $cardType->created_at !!}</td>
			<td>{!! $cardType->updated_at !!}</td>
            <td>
                <a href="{!! route('cardTypes.edit', [$cardType->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('cardTypes.delete', [$cardType->id]) !!}" onclick="return confirm('Are you sure wants to delete this CardType?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
