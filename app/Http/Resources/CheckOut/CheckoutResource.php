<?php

namespace App\Http\Resources\CheckOut;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Customers\CustomersResource;

class CheckoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // dd($this->customer);
        return [
            'id' => $this->id,
            'reservation_from' => $this->reservation->from_time,
            'reservation_to' => $this->reservation->to_time,
            'reservation_date' => $this->reservation->date,
            'table_id' => $this->table->id,
            'table_capacity' => $this->table->capacity,
            //'customers' => [
                
            //    CustomersResource::Collection($this->customer),
            //],
            'total' => $this->total,
            'paid' => $this->paid,
        ];
    }
}