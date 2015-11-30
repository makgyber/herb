<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Folio extends Model
{
    
	public $table = "folios";
    

	public $fillable = [
	    "id",
		"created_by",
		"updated_by",
		"created_at",
		"updated_at",
		"active"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "created_by" => "string",
		"updated_by" => "string",
		"active" => "boolean"
    ];

	public static $rules = [
	    
	];

}
