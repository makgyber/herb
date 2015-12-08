<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Reservation extends Model
{
    
	public $table = "reservations";
	public $primaryKey = 'reservation_id';
    public $timestamps = false;

	public $fillable = [
	    "reserve_code",
		"original_amount_paid",
		"guest_id",
		"reserve_date",
		"pax",
		"reserve_fee",
		"payment_type",
		"notes",
		"status",
		"pickup_time",
		"pickup_location",
		"date_created",
		"created_by",
		"date_updated",
		"updated_by",
		"Partner",
		"card_type",
		"approval_code",
		"batch_number",
		"is_debit",
		"card_suffix",
		"multi_entry_approver"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "reserve_code" => "string",
		"guest_id" => "integer",
		"pax" => "integer",
		"payment_type" => "string",
		"notes" => "string",
		"status" => "string",
		"pickup_time" => "string",
		"pickup_location" => "string",
		"created_by" => "integer",
		"updated_by" => "integer",
		"Partner" => "string",
		"card_type" => "string",
		"approval_code" => "string",
		"batch_number" => "string",
		"is_debit" => "integer",
		"card_suffix" => "string",
		"multi_entry_approver" => "string"
    ];

	public static $rules = [
	    
	];


	public function guest() {
		return $this->belongsTo('App\Models\Guest', 'guest_id');
	}

	public function partnerTransactions() {
		return $this->belongsTo('App\Models\PartnerTransaction', 'reserve_code', 'reserve_code');
	}

	public function reserveRooms() {
		return $this->hasMany('App\Models\ReserveRoom', 'reserve_code', 'reserve_code');
	}
}
