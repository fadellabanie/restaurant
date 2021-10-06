<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CheckOut\CheckoutResource;
use App\Http\Requests\Api\Tables\CheckAvailableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        /*
       $checkout = Order::with(['customer','table','reservation','orderDetail'])
       ->where('table_id',$request->table_id)
       ->sum('total')
       ->sum('paid')
       ->get();*/
       
       $checkout = DB::table('orders as o')
       ->join('customers as c','o.customer_id','c.id')
       ->join('tables as t','o.table_id','t.id')
       ->join('reservations as r','o.reservation_id','r.id')
       ->join('order_details as od','o.id','od.order_id')
       ->where('o.table_id',$request->table_id)
       ->select('*')
       ->get();


        return($checkout);
       return $this->respondWithItem(CheckoutResource::collection($checkout));
    }

}
