<?php namespace App\Libraries\Repositories;

use App\Models\ReservedRoomDate;
use App\Models\Room;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReservedRoomDateRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\ReservedRoomDate';
    }

	public function search($input)
    {
        $query = ReservedRoomDate::query();

        $columns = Schema::getColumnListing('reservedRoomDates');
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
            throw new HttpException(1001, "ReservedRoomDate not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "ReservedRoomDate not found");
        }

        return $model->delete();
    }

    public function findReservationsForRoomTypeInRange($start, $end, $room_type_id)
    {
        $dstart = new \DateTime($start);
        $interval = $dstart->diff(new \DateTime($end))->format('%a');

        $output = [];
        for( $ctr = 0; $ctr <= $interval; $ctr++) {
            $caldate = $dstart->format('Y-m-d');
            $output[$caldate] = $this->findAllBy('cal_date', $caldate, ['reserve_room_id', 'room_id', 'status', 'modifier']);
            $dstart->add(new \DateInterval('P1D'));
        }

        $rooms = Room::where('room_type_id', $room_type_id)->get();

        return $this->pivotRoomsByDates($rooms, $output);
    }

    protected function pivotRoomsByDates($rooms, $dates)
    {

        $calendar = [];

        foreach($rooms as $room) {
            foreach($dates as $day => $reserves) {
                $oDay = new \DateTime($day);

                $calendar[$room->door_name][$oDay->format('D m-d')] = $this->findByRoomId($reserves, $room->room_id);
            }
        }

        ksort($calendar);
        return $calendar;
    }

    protected function findByRoomId($reserves, $roomid) {
        $all = [];
        foreach($reserves as $reserve) {
            if ($reserve->room_id == $roomid) {
                array_push($all,  $reserve);
            }
        }
        return $all;
    }

}
