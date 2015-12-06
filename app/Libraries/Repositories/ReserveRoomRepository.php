<?php namespace App\Libraries\Repositories;

use App\Models\Calendar;
use App\Models\ReserveRoom;
use App\Models\Room;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;
use DB;

class ReserveRoomRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\ReserveRoom';
    }

	public function search($input)
    {
        $query = ReserveRoom::query();

        $columns = Schema::getColumnListing('reserveRooms');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]) and !empty($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] = $input[$attribute];
            }
            else
            {
                $attributes[$attribute] =  null;
            }
        }

        return [$query->get(), $attributes];
    }

    public function apiFindOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "ReserveRoom not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "ReserveRoom not found");
        }

        return $model->delete();
    }

    public function findReserveRoomsByRangeAndRoomType($start, $end, $roomType)
    {
        $dates = Calendar::getInclusiveDates($start, $end, 'Y-m-d');
        $rooms = Room::where('room_type_id', $roomType)->get();

        $sql = "select rr_id, reserve_code, room_id, status, if(checkin < '$start', '$start', checkin) as 'calstart',  if(checkin < '$start', 'extendleft', '') as 'startmodifier', if(checkout > '$end', 'extendright', '') as 'endmodifier',(datediff('$end', '$start') + if(datediff(checkout, '$end') < 0, datediff(checkout, '$end'), 0) + if(datediff('$start', checkin) < 0, datediff('$start', checkin), 0)) as 'computedlength' from reserve_rooms where checkin <= '$end' and checkout >= '$start' and room_id > 0 and room_type_id = $roomType order by room_id, checkin";
        $rr = DB::select($sql);

        $calendar = [];
        foreach ($rooms as $room) {
            foreach($dates as $day) {

                $calendar[$room->door_name][$day] = $this->getRoomsForDate($rr, $room->room_id, $day);
            }

        }
        ksort($calendar);

        return $calendar;
    }

    public function getRoomsForDate($reserveRooms, $roomId, $day) {
        $reserve = [];
        foreach($reserveRooms as $rr) {
            if ($rr->room_id == $roomId && $rr->calstart == $day) {
                array_push($reserve, $rr);
            }
        }
        return $reserve;
    }
}
