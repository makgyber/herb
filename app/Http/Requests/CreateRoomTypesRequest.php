<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\RoomTypes;

class CreateRoomTypesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return RoomTypes::$rules;
	}

}
