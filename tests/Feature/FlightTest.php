<?php

namespace Tests\Feature;

use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class FlightTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_list_flights()
    {
        Flight::factory()->count(3)->create();

        $response = $this->getJson('/flights');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }
    /** @test */
    public function can_show_flight()
    {
        $flight = Flight::factory()->create();

        $response = $this->getJson("/flights/{$flight->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $flight->id,
                     'name' => $flight->name,
                 ]);
    }
    /** @test */
    public function can_delete_flight()
    {
        $flight = Flight::factory()->create();

        $response = $this->deleteJson("/flights/{$flight->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Flight deleted']);

        $this->assertDatabaseMissing('flights', ['id' => $flight->id]);
    }
}