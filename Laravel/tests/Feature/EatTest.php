<?php

namespace Tests\Feature;

use App\Http\Resources\EatResource;
use App\Models\Eating;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EatTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    private User $user;
    private mixed $event;
    private mixed $eat;
    private array $eventData;
    private array $eatingData;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->event = Event::factory()->for($this->user)->create();
        $this->eat = EatResource::collection(Eating::factory(10)->for($this->event)->create());

        $this->eventData = [
            'user_id' => 1,
            'event_date' => now(),
            'event_description' => 'Test Eating Event'
        ];
        $this->eatingData = [
            'event_id' => $this->eat[0]->event->id,
            'calories_morning' => $this->eat[0]->calories_morning,
            'calories_evening' => $this->eat[0]->calories_evening,
            'calories_noon' => $this->eat[0]->calories_noon,
            'medicine' =>  $this->eat[0]->medicine,
            'amount_of_liquid' =>  $this->eat[0]->amount_of_liquid
        ];
    }

    public function test_eating_index_return_a_successful_response(): void
    {
        $response = $this->getJson('/api/eats');
        $response->assertStatus(200);
    }

    public function test_eating_index_count(): void
    {
        $response = $this->getJson('/api/eats');
        $response->assertJsonCount(10, "data");
    }

    public function test_eating_index_content(): void
    {
        $response = $this->getJson('/api/eats');
        $response->assertJsonPath("data.0.calories_morning", $this->eatingData['calories_morning']);
    }

    public function test_eating_store_return_a_successful_response(): void
    {
        $response = $this->postJson('/api/eats', $this->eatingData);
        $response->assertStatus(201);
    }

    public function test_eating_destroy_return_a_succesful_response(): void {
        $response = $this->deleteJson('/api/eats/' . $this->eat[0]->id);
        $response->assertStatus(204);
    }

    public function test_eating_update_return_a_succesfull_response(): void {
        $resposne = $this->putJson(('/api/eats/'. $this->eat[0]->id), $this->eatingData);
        $resposne->assertStatus(200);
    }
}   
