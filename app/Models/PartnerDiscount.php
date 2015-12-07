<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class PartnerDiscount extends Model
{
    
	public $table = "partner_discounts";
    

	public $fillable = [
	    "id",
		"partner_id",
		"discount",
		"remarks",
		"created_at",
		"updated_at"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"partner_id" => "integer",
		"remarks" => "string"
    ];

	public static $rules = [
	    
	];

}
