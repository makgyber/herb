<table class="table">
    <thead>
    <th>Pt Id</th>
			<th>Transaction Date</th>
			<th>Reserve Code</th>
			<th>Booking Number</th>
			<th>Partner Name</th>
			<th>Recievable</th>
			<th>Payable</th>
			<th>Remarks</th>
			<th>Result Status</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($partnerTransactions as $partnerTransaction)
        <tr>
            <td>{!! $partnerTransaction->pt_id !!}</td>
			<td>{!! $partnerTransaction->transaction_date !!}</td>
			<td>{!! $partnerTransaction->reserve_code !!}</td>
			<td>{!! $partnerTransaction->booking_number !!}</td>
			<td>{!! $partnerTransaction->partner_name !!}</td>
			<td>{!! $partnerTransaction->recievable !!}</td>
			<td>{!! $partnerTransaction->payable !!}</td>
			<td>{!! $partnerTransaction->remarks !!}</td>
			<td>{!! $partnerTransaction->result_status !!}</td>
            <td>
                <a href="{!! route('partnerTransactions.edit', [$partnerTransaction->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('partnerTransactions.delete', [$partnerTransaction->id]) !!}" onclick="return confirm('Are you sure wants to delete this PartnerTransaction?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
