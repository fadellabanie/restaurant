<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Waiter;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'table_id'=> Table::factory(),
            'reservation_id'=> Reservation::factory(),
            'customer_id'=> Customer::factory(),
            'waiter_id'=> Waiter::factory(),
            'total'=> $this->faker->randomDigit,
            'paid'=> $this->faker->randomDigit,
            'date'=> now()->addDays($this->faker->randomNumber(1)),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
