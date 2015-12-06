<table class="table">
    <thead>
    <th>Guest Id</th>
			<th>Firstname</th>
			<th>Middlename</th>
			<th>Lastname</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Birthday</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Mobile</th>
			<th>Nationality</th>
			<th>Remarks</th>
			<th>Company Name</th>
			<th>Company Position</th>
			<th>Company Address</th>
			<th>Company Email</th>
			<th>Company Phone</th>
			<th>Company Mobile</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($guests as $guest)
        <tr>
            <td>{!! $guest->guest_id !!}</td>
			<td>{!! $guest->firstname !!}</td>
			<td>{!! $guest->middlename !!}</td>
			<td>{!! $guest->lastname !!}</td>
			<td>{!! $guest->address !!}</td>
			<td>{!! $guest->gender !!}</td>
			<td>{!! $guest->birthday !!}</td>
			<td>{!! $guest->email !!}</td>
			<td>{!! $guest->phone !!}</td>
			<td>{!! $guest->mobile !!}</td>
			<td>{!! $guest->nationality !!}</td>
			<td>{!! $guest->remarks !!}</td>
			<td>{!! $guest->company_name !!}</td>
			<td>{!! $guest->company_position !!}</td>
			<td>{!! $guest->company_address !!}</td>
			<td>{!! $guest->company_email !!}</td>
			<td>{!! $guest->company_phone !!}</td>
			<td>{!! $guest->company_mobile !!}</td>
            <td>
                <a href="{!! route('guests.edit', [$guest->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('guests.delete', [$guest->id]) !!}" onclick="return confirm('Are you sure wants to delete this Guest?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
