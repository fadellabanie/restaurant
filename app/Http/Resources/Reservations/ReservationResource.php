<?php

namespace App\Http\Resources\Reservations;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'capacity' => $this->table->capacity,
            'customer_name' => $this->customer->name,
            'customer_phone' => $this->customer->phone,
            'date' => $this->date,
            'from_time' => $this->from_time,
            'to_time' => $this->to_time,
        ];
    }
}