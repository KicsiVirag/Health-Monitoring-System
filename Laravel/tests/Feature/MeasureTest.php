<?php

namespace Tests\Feature;

use App\Http\Resources\MeasureResource;
use App\Models\Event;
use App\Models\Measure;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MeasureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    private User $user;
    private mixed $event;
    private mixed $measure;
    private array $eventData;
    private array $measureData;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->event = Event::factory()->for($this->user)->create();
        $this->measure = MeasureResource::collection(Measure::factory(10)->for($this->event)->create());
        $this->eventData = [
            'user_id' => 1,
            'event_date' => now(),
            'event_description' => 'Test Eating Event'
        ];
        $this->measureData = [
            'event_id' => $this->measure[0]->event->id,
            'pulse' => $this->measure[0]->pulse,
            'blood_pressure' => $this->measure[0]->blood_pressure
        ];
    }

    public function test_measures_index_return_a_successful_response(): void
    {
        $response = $this->getJson('/api/measures');
        $response->assertStatus(200);
    }

    public function test_measures_index_count(): void
    {
        $response = $this->getJson('/api/measures');
        $response->assertJsonCount(10, "data");
    }

    public function test_measures_index_content(): void
    {
        $response = $this->getJson('/api/measures');
        $response->assertJsonPath("data.0.pulse", $this->measureData['pulse']);
    }

    public function test_measures_store_return_a_successful_response(): void
    {
        $response = $this->postJson('/api/measures', $this->measureData);
        $response->assertStatus(201);
    }

    public function test_measure_destroy_return_a_succesful_response(): void {
        $response = $this->deleteJson('/api/measures/' . $this->measure[0]->id);
        $response->assertStatus(204);
    }

    public function test_measure_update_return_a_succesfull_response(): void {
        $resposne = $this->putJson(('/api/measures/'. $this->measure[0]->id), $this->measureData);
        $resposne->assertStatus(200);
    }
}
