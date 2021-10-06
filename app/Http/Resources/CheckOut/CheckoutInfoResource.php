<?php

namespace App\Http\Resources\CheckOut;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Customers\CustomersResource;

class CheckoutInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
     
        return [
            'id' => $this->id,
            'reservation_from' => $this->from_time,
            'reservation_to' => $this->to_time,
            'reservation_date' => $this->date,
            'customers' => [
                'customer_id' => $this->customer_id,
                'customer_name' => $this->name,
                'customer_phone' => $this->phone,
            ],
            'meals' => [
                'meal_id' => $this->meal_id,
                'meal_price' => $this->price,
                'meal_discount' => $this->discount,
                'meal_description' => $this->description,
            ],
          
        ];
    }
}