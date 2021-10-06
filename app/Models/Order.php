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
        return $this->hasOne(Table::class);
    }
    public function customer()
    {
        return $this->hasOne(Customer::class);
    } 
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    } 
    public function waiter()
    {
        return $this->hasOne(Waiter::class);
    } 

}
