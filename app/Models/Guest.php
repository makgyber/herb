<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Guest extends Model
{
    
	public $table = "guests";
	public $primaryKey = "guest_id";
    

	public $fillable = [
	    "guest_id",
		"firstname",
		"middlename",
		"lastname",
		"address",
		"gender",
		"birthday",
		"email",
		"phone",
		"mobile",
		"nationality",
		"remarks",
		"company_name",
		"company_position",
		"company_address",
		"company_email",
		"company_phone",
		"company_mobile"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "guest_id" => "integer",
		"firstname" => "string",
		"middlename" => "string",
		"lastname" => "string",
		"address" => "string",
		"gender" => "string",
		"email" => "string",
		"phone" => "string",
		"mobile" => "string",
		"nationality" => "string",
		"remarks" => "string",
		"company_name" => "string",
		"company_position" => "string",
		"company_address" => "string",
		"company_email" => "string",
		"company_phone" => "string",
		"company_mobile" => "string"
    ];

	public static $rules = [
	    
	];

}
