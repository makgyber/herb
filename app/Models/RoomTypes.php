<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class RoomTypes extends Model
{
    
	public $table = "room_types";
    

	public $fillable = [
	    "room_type_id",
		"room_type_name",
		"site_id",
		"rank"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "room_type_id" => "integer",
		"room_type_name" => "string",
		"site_id" => "integer",
		"rank" => "integer"
    ];

	public static $rules = [
	    
	];

}
