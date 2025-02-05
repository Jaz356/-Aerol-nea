<?php

namespace Database\Factories;

use App\Models\Plane;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaneFactory extends Factory
{
    protected $model = Plane::class;

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