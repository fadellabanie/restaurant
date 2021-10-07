<?php

namespace App\Http\Resources\Meal;

use App\Http\Resources\Meal\MealCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class MealTinyResource extends JsonResource
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
            'price' => $this->price . "$",
            'description' => $this->description,
            'quantity_available' => $this->quantity_available,
            'discount' => $this->discount,
            'type' => $this->type,
        ];
    }
}