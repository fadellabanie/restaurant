<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    const BREAKFAST = 1;
    const LAUNCH = 2;
    const DINNER = 3;
    const APPETIZER = 4;

    protected $fillable = ['price', 'description', 'quantity_available', 'discount', 'type'];

    public function scopeAvailable($query)
    {
        return $query->where('quantity_available', '>', 0);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class,'order_details','order_id','meal_id');
    } 
}
