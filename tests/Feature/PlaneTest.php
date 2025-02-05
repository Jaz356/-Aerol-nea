<?php

namespace Tests\Feature;

use App\Models\Plane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PlaneTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_list_planes()
    {
        Plane::factory()->count(3)->create();

        $response = $this->getJson('/planes');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function can_create_plane()
    {
        $planeData = Plane::factory()->make()->toArray();

        $response = $this->postJson('/planes', $planeData);

        $response->assertStatus(201)
                 ->assertJsonFragment($planeData);

        $this->assertDatabaseHas('planes', $planeData);
    }

    /** @test */
    public function can_show_plane()
    {
        $plane = Plane::factory()->create();

        $response = $this->getJson("/planes/{$plane->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $plane->id,
                     'name' => $plane->name,
                 ]);
    }

    /** @test */
    public function can_update_plane()
    {
        $plane = Plane::factory()->create();
        $updatedData = Plane::factory()->make()->toArray();

        $response = $this->putJson("/planes/{$plane->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData);

        $this->assertDatabaseHas('planes', $updatedData);
    }

    /** @test */
    public function can_delete_plane()
    {
        $plane = Plane::factory()->create();

        $response = $this->deleteJson("/planes/{$plane->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Plane deleted']);

        $this->assertDatabaseMissing('planes', ['id' => $plane->id]);
    }
}