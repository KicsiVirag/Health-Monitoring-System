<?php

namespace Tests\Feature;

use App\Models\Health;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HealthTest extends TestCase
{
    use RefreshDatabase;
    private User $user;
    private mixed $health;
    private array $healthData;
    public function setUp(): void{
        parent::setUp();
        $this->user = User::factory()->create();
        $this->health = Health::factory(10)->for($this->user)->create();
        $this->healthData=[
            'user_id'=> $this->health[0]->user->id,
            'weight'=> $this->health[0]->weight,
            'height'=> $this->health[0]->height,
            'date'=> $this->health[0]->date
        ];
    }
    
    public function test_health_index_return_a_successfull_response(): void
    {
        $response = $this->get('/api/healths');
        $response->assertStatus(200);
    }
    public function test_health_index_count(): void
    {
        $response = $this->get('/api/healths');
        $response->assertJsonCount(10, "data");
    }
    public function test_health_index_content(): void
    {
        $response = $this->get('/api/healths');
        $response->assertJsonPath("data.0.weight", $this->health[0]->weight);
    }
    public function test_health_store_return_a_successfull_response(): void
    {
        $response = $this->postJson('/api/healths',$this->healthData);
        $response->assertStatus(201);
    }
    public function test_health_destroy_return_a_succesful_response(): void {
        $response = $this->deleteJson('/api/healths/' . $this->health[0]->id);
        $response->assertStatus(204);
    }

    public function test_health_update_return_a_succesfull_response(): void {
        $resposne = $this->putJson(('/api/healths/'. $this->health[0]->id), $this->healthData);
        $resposne->assertStatus(200);
    }
}
