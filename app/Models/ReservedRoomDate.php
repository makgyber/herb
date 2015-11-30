<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ReservedRoomDate extends Model
{
    
	public $table = "reserved_room_date";
    

	public $fillable = [
	    "id",
		"reserve_room_id",
		"room_id",
		"cal_date",
		"status",
		"modifier"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "room_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
