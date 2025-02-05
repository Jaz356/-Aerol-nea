<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'airline' => $this->faker->company,
            'flight_no' => $this->faker->unique()->numerify('FL###'),
            'date' => $this->faker->date,
            'departure_time' => $this->faker->dateTime,
            'arrival_time' => $this->faker->dateTime,
            'departure' => $this->faker->city,
            'arrival' => $this->faker->city,
            'booked_seats' => $this->faker->numberBetween(0, 200),
            'plane_id' => Plane::factory(), // Ensure this line is correct
            'available' => $this->faker->boolean,
        ];
    }
}