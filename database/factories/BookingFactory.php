<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'model' => $this->faker->word,
            'manufacturer' => $this->faker->company,
            'capacity' => $this->faker->numberBetween(100, 300),
            'year' => $this->faker->year,
        ];
    }
}