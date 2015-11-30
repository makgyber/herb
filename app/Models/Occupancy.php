<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Occupancy extends Model
{
    
	public $table = "occupancy";
    

	public $fillable = [
	    "occupancy_id",
		"actual_checkin",
		"expected_checkout",
		"actual_checkout",
		"shift_checkin",
		"room_id",
		"rate_id",
		"update_by",
		"wakeup",
		"isalerted",
		"regflag"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "shift_checkin" => "integer",
		"room_id" => "integer",
		"rate_id" => "integer",
		"update_by" => "integer",
		"wakeup" => "string",
		"isalerted" => "string",
		"regflag" => "integer"
    ];

	public static $rules = [
	    
	];

}
