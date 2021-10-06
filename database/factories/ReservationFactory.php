<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            'table_id'=> Table::factory(),
            'customer_id'=> Customer::factory(),
            'code' => 'rsv-'.substr(md5(microtime()),rand(0,26),5),
            'date'=> now()->addDays($this->faker->randomNumber(1)),
            'from_time'=> now(),
            'to_time'=> now()->addHours(3),
            'status'=>  $this->faker->randomElement([Reservation::AVAILABLE, Reservation::UNAVAILABLE]),
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
