<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Waiter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::factory(10)->create();
        Order::factory(10)->create();
        Reservation::factory(10)->create();
        Meal::factory(50)->create();
        Table::factory(10)->create();
        Waiter::factory(5)->create();
        Customer::factory(50)->create();
    }
}
