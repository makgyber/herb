<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class FinanceCharge extends Model
{
    
	public $table = "finance_charges";
    

	public $fillable = [
	    "card_type_id",
		"account_type",
		"charge"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "card_type_id" => "integer",
		"account_type" => "string",
		"charge" => "string"
    ];

	public static $rules = [
	    "card_type_id" => "required"
	];

	public function cardType() {
		return $this->hasOne('App\Models\CardType', 'card_type_id');
	}
}
