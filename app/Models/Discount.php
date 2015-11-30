<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Discount extends Model
{
    
	public $table = "discounts";
    

	public $fillable = [
	    "discount_id",
		"discount_label",
		"discount_type",
		"discount_percent"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "discount_id" => "integer",
		"discount_label" => "string",
		"discount_type" => "string",
		"discount_percent" => "float"
    ];

	public static $rules = [
	    
	];

}
