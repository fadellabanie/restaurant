<?php

namespace App\Http\Requests\Api\Tables;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
          'table_id' => 'required|exists:tables,id',
          'customer_id' => 'required|exists:customers,id',
          //'from_time' => 'required|date_format:H:i',
          'to_time' => 'required|date_format:H:i',
          'date' =>'required|date|date_format:Y-m-d|after:yesterday',
        ];
    }
}
