<?php

namespace App\Http\Requests\Api\Orders;

use Illuminate\Foundation\Http\FormRequest;

class MakeOrderRequest extends FormRequest
{
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
        return [
            'table_id' =>'required|exists:tables,id',
            'user_id' =>'required|exists:users,id',
            'reservation_id' =>'required|exists:reservations,id',
            'meal_id' =>'required|exists:meal,id',
        ];
    }
}
