<?php

namespace Tests\Feature;

use App\Http\Resources\TrainingResource;
use App\Models\Event;
use App\Models\Training;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrainingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    private User $user;
    private mixed $event;
    private mixed $training;
    private array $eventData;
    private array $trainingData;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->event = Event::factory()->for($this->user)->create();
        $this->training = TrainingResource::collection(Training::factory(10)->for($this->event)->create());

        $this->eventData = [
            'user_id' => 1,
            'event_date' => now(),
            'event_description' => 'Test Training Event'
        ];
        $this->trainingData = [
            'event_id' => $this->training[0]->event->id,
            'number_of_steps' => $this->training[0]->number_of_steps,
            'training_intensity' => $this->training[0]->training_intensity,
            'training_durration' => $this->training[0]->training_durration,
            'training_type' =>  $this->training[0]->training_type,
            'training_location' =>  $this->training[0]->training_location
        ];
    }

    public function test_training_index_return_a_successful_response(): void
    {
        $response = $this->getJson('/api/trainings');
        $response->assertStatus(200);
    }

    public function test_training_index_count(): void
    {
        $response = $this->getJson('/api/trainings');
        $response->assertJsonCount(10, "data");
    }

    public function test_training_index_content(): void
    {
        $response = $this->getJson('/api/trainings');
        $response->assertJsonPath("data.0.number_of_steps", $this->trainingData['number_of_steps']);
    }

    public function test_training_store_return_a_successful_response(): void
    {
        $response = $this->postJson('/api/trainings', $this->trainingData);
        $response->assertStatus(201);
    }

    public function test_training_destroy_return_a_succesful_response(): void {
        $response = $this->deleteJson('/api/trainings/' . $this->training[0]->id);
        $response->assertStatus(204);
    }

    public function test_training_update_return_a_succesfull_response(): void {
        $resposne = $this->putJson(('/api/trainings/'. $this->training[0]->id), $this->trainingData);
        $resposne->dump();
        $resposne->assertStatus(200);
    }
}
