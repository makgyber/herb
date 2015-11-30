<table class="table">
    <thead>
    <th>Reserve Code</th>
			<th>Original Amount Paid</th>
			<th>Guest Id</th>
			<th>Reserve Date</th>
			<th>Pax</th>
			<th>Reserve Fee</th>
			<th>Payment Type</th>
			<th>Notes</th>
			<th>Status</th>
			<th>Pickup Time</th>
			<th>Pickup Location</th>
			<th>Date Created</th>
			<th>Created By</th>
			<th>Date Updated</th>
			<th>Updated By</th>
			<th>Partner</th>
			<th>Card Type</th>
			<th>Approval Code</th>
			<th>Batch Number</th>
			<th>Is Debit</th>
			<th>Card Suffix</th>
			<th>Multi Entry Approver</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($reservations as $reservation)
        <tr>
            <td>{!! $reservation->reserve_code !!}</td>
			<td>{!! $reservation->original_amount_paid !!}</td>
			<td>{!! $reservation->guest_id !!}</td>
			<td>{!! $reservation->reserve_date !!}</td>
			<td>{!! $reservation->pax !!}</td>
			<td>{!! $reservation->reserve_fee !!}</td>
			<td>{!! $reservation->payment_type !!}</td>
			<td>{!! $reservation->notes !!}</td>
			<td>{!! $reservation->status !!}</td>
			<td>{!! $reservation->pickup_time !!}</td>
			<td>{!! $reservation->pickup_location !!}</td>
			<td>{!! $reservation->date_created !!}</td>
			<td>{!! $reservation->created_by !!}</td>
			<td>{!! $reservation->date_updated !!}</td>
			<td>{!! $reservation->updated_by !!}</td>
			<td>{!! $reservation->Partner !!}</td>
			<td>{!! $reservation->card_type !!}</td>
			<td>{!! $reservation->approval_code !!}</td>
			<td>{!! $reservation->batch_number !!}</td>
			<td>{!! $reservation->is_debit !!}</td>
			<td>{!! $reservation->card_suffix !!}</td>
			<td>{!! $reservation->multi_entry_approver !!}</td>
            <td>
                <a href="{!! route('reservations.edit', [$reservation->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('reservations.delete', [$reservation->id]) !!}" onclick="return confirm('Are you sure wants to delete this Reservation?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
