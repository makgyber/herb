<table class="table">
    <thead>
    <th>Id</th>
			<th>Partner Id</th>
			<th>Discount</th>
			<th>Remarks</th>
			<th>Created At</th>
			<th>Updated At</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($partnerDiscounts as $partnerDiscount)
        <tr>
            <td>{!! $partnerDiscount->id !!}</td>
			<td>{!! $partnerDiscount->partner_id !!}</td>
			<td>{!! $partnerDiscount->discount !!}</td>
			<td>{!! $partnerDiscount->remarks !!}</td>
			<td>{!! $partnerDiscount->created_at !!}</td>
			<td>{!! $partnerDiscount->updated_at !!}</td>
            <td>
                <a href="{!! route('partnerDiscounts.edit', [$partnerDiscount->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('partnerDiscounts.delete', [$partnerDiscount->id]) !!}" onclick="return confirm('Are you sure wants to delete this PartnerDiscount?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
