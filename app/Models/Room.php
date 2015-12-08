<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Room extends Model
{
    
	public $table = "rooms";
    public $primaryKey = "room_id";

	public $fillable = [
	    "room_id",
		"door_name",
		"site_id",
		"floor_id",
		"room_type_id",
		"theme_id",
		"ui_top",
		"ui_left",
		"ui_width",
		"ui_height",
		"status",
		"last_update",
		"update_by",
		"website"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "room_id" => "integer",
		"door_name" => "string",
		"site_id" => "integer",
		"floor_id" => "integer",
		"room_type_id" => "integer",
		"theme_id" => "integer",
		"ui_top" => "integer",
		"ui_left" => "integer",
		"ui_width" => "integer",
		"ui_height" => "integer",
		"status" => "integer",
		"update_by" => "integer",
		"website" => "integer"
    ];

	public static $rules = [
	    
	];

}
