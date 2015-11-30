<table class="table">
    <thead>
    <th>Discount Id</th>
			<th>Discount Label</th>
			<th>Discount Type</th>
			<th>Discount Percent</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($discounts as $discount)
        <tr>
            <td>{!! $discount->discount_id !!}</td>
			<td>{!! $discount->discount_label !!}</td>
			<td>{!! $discount->discount_type !!}</td>
			<td>{!! $discount->discount_percent !!}</td>
            <td>
                <a href="{!! route('discounts.edit', [$discount->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('discounts.delete', [$discount->id]) !!}" onclick="return confirm('Are you sure wants to delete this Discount?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
