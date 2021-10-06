<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Waiter;
use App\Models\Customer;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      
        return [
            'order_id'=> Order::factory(),
            'meal_id'=> Meal::factory(),
            'amount_to_pay'=> $this->faker->randomDigit,
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
