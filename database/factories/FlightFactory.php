<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition()
    {
        return [
            'number' => $this->faker->unique()->numerify('FL###'),
            'destination' => $this->faker->city,
            'date' => $this->faker->date,
            'departure_time' => $this->faker->dateTime,
            'arrival_time' => $this->faker->dateTime,
            'departure' => $this->faker->city,
            'arrival' => $this->faker->city,
            'booked_seats' => $this->faker->numberBetween(0, 200),
            'plane_id' => Plane::factory(),
            'available' => $this->faker->boolean,
        ];
    }
}