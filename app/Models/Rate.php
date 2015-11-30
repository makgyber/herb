<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Rate extends Model
{
    
	public $table = "rates";
    

	public $fillable = [
	    "rate_id",
		"rate_name",
		"hour_start",
		"hour_end",
		"duration"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "rate_id" => "integer",
		"rate_name" => "string",
		"hour_start" => "integer",
		"hour_end" => "integer",
		"duration" => "integer"
    ];

	public static $rules = [
	    
	];

}
