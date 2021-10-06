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
        return [
            CheckoutInfoResource::collection($this['info']),
            'sum_of_order' => $this['total']->total,
            'paid' => $this['total']->paid,
            'discount' => $this['total']->discount,
            'total' => $this['total']->discount > $this['total']->total ? 0 : $this['total']->discount - $this['total']->total,
        ];
    }
}