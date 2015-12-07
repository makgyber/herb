<table class="table">
    <thead>
    <th>Card Type Id</th>
			<th>Account Type</th>
			<th>Charge</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($financeCharges as $financeCharge)
        <tr>
            <td>{!! $financeCharge->card_type_id !!}</td>
			<td>{!! $financeCharge->account_type !!}</td>
			<td>{!! $financeCharge->charge !!}</td>
            <td>
                <a href="{!! route('financeCharges.edit', [$financeCharge->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('financeCharges.delete', [$financeCharge->id]) !!}" onclick="return confirm('Are you sure wants to delete this FinanceCharge?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
