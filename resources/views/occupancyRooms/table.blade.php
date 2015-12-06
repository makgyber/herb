<table class="table">
    <thead>
    
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($occupancyRooms as $occupancyRoom)
        <tr>
            
            <td>
                <a href="{!! route('occupancyRooms.edit', [$occupancyRoom->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('occupancyRooms.delete', [$occupancyRoom->id]) !!}" onclick="return confirm('Are you sure wants to delete this OccupancyRoom?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
