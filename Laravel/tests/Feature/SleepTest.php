<?php

namespace Tests\Feature;

use App\Http\Resources\SleepResource;
use App\Models\Event;
use App\Models\Sleep;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SleepTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    private User $user;
    private mixed $event;
    private mixed $sleep;
    private array $eventData;
    private array $sleepingData;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->event = Event::factory()->for($this->user)->create();
        $this->sleep = SleepResource::collection(Sleep::factory(10)->for($this->event)->create());

        $this->eventData = [
            'user_id' => 1,
            'event_date' => now(),
            'event_description' => 'Test Training Event'
        ];
        $this->sleepingData = [
            'event_id' => $this->sleep[0]->event->id,
            'sleep_durration' => $this->sleep[0]->sleep_durration,
            'number_of_awaking' => $this->sleep[0]->number_of_awaking,
            'sleep_quality' => $this->sleep[0]->sleep_quality
        ];
    }

    public function test_sleep_index_return_a_successful_response(): void
    {
        $response = $this->getJson('/api/sleeps');
        $response->assertStatus(200);
    }

    public function test_sleep_index_count(): void
    {
        $response = $this->getJson('/api/sleeps');
        $response->assertJsonCount(10, "data");
    }

    public function test_sleep_index_content(): void
    {
        $response = $this->getJson('/api/sleeps');
        $response->assertJsonPath("data.0.sleep_durration", $this->sleepingData['sleep_durration']);
    }

    public function test_sleep_store_return_a_successful_response(): void
    {
        $response = $this->postJson('/api/sleeps', $this->sleepingData);
        $response->assertStatus(201);
    }

    public function test_sleep_destroy_return_a_succesful_response(): void {
        $response = $this->deleteJson('/api/sleeps/' . $this->sleep[0]->id);
        $response->assertStatus(204);
    }

    public function test_sleep_update_return_a_succesfull_response(): void {
        $resposne = $this->putJson(('/api/sleeps/'. $this->sleep[0]->id), $this->sleepingData);
        $resposne->assertStatus(200);
    }
}
