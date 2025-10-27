<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;
    private User $user;
    private mixed $event;
    private array $eventData;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->event = Event::factory(10)->for($this->user)->create();
        $this->eventData = [
            'user_id' => $this->event[0]->user->id,
            'event_date' => $this->event[0]->event_date,
            'event_description' => $this->event[0]->event_description,
        ];
    }

    public function test_event_index_return_a_successfull_response(): void
    {
        $response = $this->get('/api/events');
        $response->assertStatus(200);
    }
    public function test_event_index_count(): void
    {
        $response = $this->get('/api/events');
        $response->assertJsonCount(10, "data");
    }
    public function test_event_index_content(): void
    {
        $response = $this->get('/api/events');
        $response->assertJsonPath("data.0.event_description", $this->event[0]->event_description);
    }
    public function test_event_store_return_a_successfull_response(): void
    {
        $response = $this->postJson('/api/events', $this->eventData);
        $response->assertStatus(201);
    }
    public function test_event_destroy_return_a_succesful_response(): void {
        $response = $this->deleteJson('/api/events/' . $this->event[0]->id);
        $response->assertStatus(204);
    }

    public function test_event_update_return_a_succesfull_response(): void {
        $resposne = $this->putJson(('/api/events/'. $this->event[0]->id), $this->eventData);
        $resposne->assertStatus(200);
    }
}
