<table class="table">
    <thead>
    <th>Rate Id</th>
			<th>Rate Name</th>
			<th>Hour Start</th>
			<th>Hour End</th>
			<th>Duration</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($rates as $rate)
        <tr>
            <td>{!! $rate->rate_id !!}</td>
			<td>{!! $rate->rate_name !!}</td>
			<td>{!! $rate->hour_start !!}</td>
			<td>{!! $rate->hour_end !!}</td>
			<td>{!! $rate->duration !!}</td>
            <td>
                <a href="{!! route('rates.edit', [$rate->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('rates.delete', [$rate->id]) !!}" onclick="return confirm('Are you sure wants to delete this Rate?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
