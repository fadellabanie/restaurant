<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'meal_id', 'amount_to_pay'];

     #################
    ### Relations ###
    #################
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function meal()
    {
        return $this->hasOne(Meal::class);
    } 
}