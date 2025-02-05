<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'airline' => $this->faker->company,
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'arrival_time' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'departure_airport' => $this->faker->city,
            'arrival_airport' => $this->faker->city,
        ];
    }
}