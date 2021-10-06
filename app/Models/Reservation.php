<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    const AVAILABLE = 0 ;
    const UNAVAILABLE = 1 ;

    protected $fillable = ['table_id','customer_id','code','date','from_time','to_time','status'];
 
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
}
