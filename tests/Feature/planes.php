<?php

namespace Tests\Feature;

use App\Models\Plane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlaneTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test listing all planes.
     */
    public function test_can_list_planes(): void
    {
        Plane::factory()->count(3)->create();

        $response = $this->getJson('/planes');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /**
     * Test creating a plane.
     */
    public function test_can_create_plane(): void
    {
        $planeData = [
            'name' => 'Plane 101',
            'model' => 'Boeing 747',
            'capacity' => 300
        ];

        $response = $this->postJson('/planes', $planeData);

        $response->assertStatus(201)
                 ->assertJsonFragment($planeData);

        $this->assertDatabaseHas('planes', $planeData);
    }

    /**
     * Test showing a plane.
     */
    public function test_can_show_plane(): void
    {
        $plane = Plane::factory()->create();

        $response = $this->getJson("/planes/{$plane->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $plane->id,
                     'name' => $plane->name,
                     'model' => $plane->model,
                     'capacity' => $plane->capacity
                 ]);
    }

    /**
     * Test updating a plane.
     */
    public function test_can_update_plane(): void
    {
        $plane = Plane::factory()->create();

        $updatedData = [
            'name' => 'Updated Plane Name',
            'model' => 'Updated Model',
            'capacity' => 350
        ];

        $response = $this->putJson("/planes/{$plane->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData);

        $this->assertDatabaseHas('planes', $updatedData);
    }

    /**
     * Test deleting a plane.
     */
    public function test_can_delete_plane(): void
    {
        $plane = Plane::factory()->create();

        $response = $this->deleteJson("/planes/{$plane->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Plane deleted']);

        $this->assertDatabaseMissing('planes', ['id' => $plane->id]);
    }
}
