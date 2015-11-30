<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Floor extends Model
{
    
	public $table = "floors";
    

	public $fillable = [
	    "floor_id",
		"site_id",
		"floor_label"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "floor_id" => "integer",
		"site_id" => "integer",
		"floor_label" => "string"
    ];

	public static $rules = [
	    
	];

}
