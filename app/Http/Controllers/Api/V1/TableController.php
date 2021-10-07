<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CheckOut\CheckoutResource;
use App\Models\Customer;
use App\Models\Order;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $checkout['info'] = DB::table('orders as o')
            ->join('customers as c', 'o.customer_id', 'c.id')
            //->join('tables as t','o.table_id','t.id')
            ->join('reservations as r', 'o.reservation_id', 'r.id')
            ->leftJoin('order_details as od', 'od.order_id', 'o.id')
            ->leftJoin('meals as m', 'od.meal_id', 'm.id')
            ->where('o.table_id', $request->table_id)
            ->select(
                'c.id as customer_id',
                'c.name',
                'c.phone',
                'r.code',
                'r.from_time',
                'r.to_time',
                'r.date',
                'o.id',
                'od.amount_to_pay',
                'm.id as meal_id',
                'm.price',
                'm.description',
                'm.discount'
            )->get();

        $checkout['total'] = DB::table('orders as o')
            ->leftJoin('order_details as od', 'od.order_id', 'o.id')
            ->leftJoin('meals as m', 'od.meal_id', 'm.id')
            ->where('o.table_id', $request->table_id)
            ->first(array(
                DB::raw('SUM(o.total) as total'),
                DB::raw('SUM(o.paid) as paid'),
                DB::raw('SUM(m.discount) as discount'),
            ));

        return $this->respondWithItem(new CheckoutResource($checkout));
    }

    public function print(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $orderDetail = Order::with('orderDetail', 'meal')->where('customer_id', $request->customer_id)
            ->where('table_id', $request->table_id)
            ->first();
        if (!$orderDetail) {
            return $this->errorStatus("Wrong argument");
        }
        $customer = new Buyer([
            'name'          => $customer->name,
            'custom_fields' => [
                'phone' => $customer->phone,
            ],
        ]);

        $item = (new InvoiceItem())->title($orderDetail->meal->first()->description)->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->taxRate(15)
            ->addItem($item);

        return $invoice->stream();
    }
}
