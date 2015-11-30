<table class="table">
    <thead>
    
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($bookingRoomTypes as $bookingRoomTypes)
        <tr>
            
            <td>
                <a href="{!! route('bookingRoomTypes.edit', [$bookingRoomTypes->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('bookingRoomTypes.delete', [$bookingRoomTypes->id]) !!}" onclick="return confirm('Are you sure wants to delete this BookingRoomTypes?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
