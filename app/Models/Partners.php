<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Partners extends Model
{
    
	public $table = "partners";
    

	public $fillable = [
	    "partner_id",
		"partner_name",
		"remarks",
		"active"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "partner_id" => "integer",
		"partner_name" => "string",
		"remarks" => "string",
		"active" => "integer"
    ];

	public static $rules = [
	    
	];

}
