<?php

namespace Tests\Feature;

use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FlightTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test listing all flights.
     */
    public function test_can_list_flights(): void
    {
        Flight::factory()->count(3)->create();

        $response = $this->getJson('/flights');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /**
     * Test creating a flight.
     */
    public function test_can_create_flight(): void
    {
        $flightData = [
            'flight_no' => 'Flight 101',
            'destination' => 'New York'
        ];

        $response = $this->postJson('/flights', $flightData);

        $response->assertStatus(201)
                 ->assertJsonFragment($flightData);

        $this->assertDatabaseHas('flights', $flightData);
    }

    /**
     * Test showing a flight.
     */
    public function test_can_show_flight(): void
    {
        $flight = Flight::factory()->create();

        $response = $this->getJson("/flights/{$flight->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $flight->id,
                     'flight_no' => $flight->name,
                     'destination' => $flight->destination
                 ]);
    }

    /**
     * Test updating a flight.
     */
    public function test_can_update_flight(): void
    {
        $flight = Flight::factory()->create();

        $updatedData = [
            'flight_no' => 'Updated Flight Name',
            'destination' => 'Updated Destination'
        ];

        $response = $this->putJson("/flights/{$flight->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData);

        $this->assertDatabaseHas('flights', $updatedData);
    }

    /**
     * Test deleting a flight.
     */
    public function test_can_delete_flight(): void
    {
        $flight = Flight::factory()->create();

        $response = $this->deleteJson("/flights/{$flight->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Flight deleted']);

        $this->assertDatabaseMissing('flights', ['id' => $flight->id]);
    }
}