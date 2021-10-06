<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['capacity'];

    //public $with = [''];

    #################
    ### Relations ###
    #################
    
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    } 
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    } 
   
}
