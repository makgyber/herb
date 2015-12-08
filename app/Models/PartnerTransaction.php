<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class PartnerTransaction extends Model
{
    
	public $table = "partner_transactions";
	public $primaryKey = "pt_id";
    

	public $fillable = [
	    "pt_id",
		"transaction_date",
		"reserve_code",
		"booking_number",
		"partner_name",
		"recievable",
		"payable",
		"remarks",
		"result_status",
		"commission",
		"discount"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "reserve_code" => "string",
		"booking_number" => "string",
		"partner_name" => "string",
		"remarks" => "string",
		"result_status" => "string",
		"commission" => "string",
		"discount" => "string"
    ];

	public static $rules = [
	    
	];

}


