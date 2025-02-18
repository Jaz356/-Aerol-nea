<?php

namespace Tests\Feature;

use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_list_Booking()
    {
        Booking::factory()->count(3)->create();

        $response = $this->getJson('/Bookings');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }
    /** @test */
    public function can_create_booking()
    {
        $booking = Booking::factory()->make()->toArray();

        $response = $this->postJson('/Bookings', $booking);

        $response->assertStatus(201)
                 ->assertJsonFragment($booking);

        $this->assertDatabaseHas('Bookings', $booking);
    }
    /** @test */
    public function can_show_Booking()
    {
        $Booking = Booking::factory()->create();

        $response = $this->getJson("/Bookings/{$Booking->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $Booking->id,
                     'name' => $Booking->name,
                 ]);
    }

    /** @test */
    public function can_update_Booking()
    {
        $Booking = Booking::factory()->create();

        $updatedData = Booking::factory()->make()->toArray();

        $response = $this->putJson("/Bookings/{$Booking->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData);

        $this->assertDatabaseHas('Bookings', $updatedData);
    }

    /** @test */
    public function can_delete_Booking()
    {
        $Booking = Booking::factory()->create();

        $response = $this->deleteJson("/Bookings/{$Booking->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Booking deleted']);

        $this->assertDatabaseMissing('Bookings', ['id' => $Booking->id]);
    }
}