<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ReserveRoom extends Model
{
    
	public $table = "reserve_rooms";
    public $primaryKey = 'rr_id';

	public $fillable = [
	    "rr_id",
		"reserve_code",
		"room_type_id",
		"room_id",
		"checkin",
		"checkout",
		"deposit",
		"status"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "reserve_code" => "string",
		"room_type_id" => "integer",
		"room_id" => "integer",
		"deposit" => "integer",
		"status" => "string"
    ];

	public static $rules = [
	    
	];

}
