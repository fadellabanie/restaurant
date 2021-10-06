<?php

namespace App\Http\Requests\Api\Tables;

use Illuminate\Foundation\Http\FormRequest;

class CheckAvailableRequest extends FormRequest
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
            'time' =>'required',
            'date' =>'required|date|after:yesterday',
            'capacity' =>'required|number',
        ];
    }
}