<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['table_id','reservation_id','customer_id','waiter_id','total','paid','date'];

    #################
    ### Relations ###
    #################
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    } 
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    } 
    public function waiter()
    {
        return $this->hasOne(Waiter::class);
    }  
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    } 
     public function meal()
    {
        return $this->belongsToMany(Meal::class,'order_details','meal_id','order_id');
    } 

}
