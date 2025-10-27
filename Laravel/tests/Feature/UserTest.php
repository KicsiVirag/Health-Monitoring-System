<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    private mixed $user;
    private array $userData;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory(10)->create();
        $this->userData=[
            'username' => $this->user[0]->username,
            'name' => $this->user[0]->name,
            'email' => $this->user[0]->email,
            'password'=> $this->user[0]->password,
            'birth_date' => $this->user[0]->birth_date,
            'gender' => $this->user[0]->gender
        ];
    }
    public function test_user_index_return_a_successfull_response(): void
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }
    public function test_user_index_count(): void
    {
        $response = $this->get('/api/users');
        $response->assertJsonCount(10, "data");
    }
    public function test_user_index_content(): void
    {
        $response = $this->get('/api/users');
        $response->assertJsonPath("data.0.username", $this->user[0]->username);
    }
    public function test_user_store_return_a_successfull_response(): void
    {
        $response = $this->postJson('/api/users',$this->userData);
        $response->assertStatus(201);
    }
    public function test_user_store_name_number_too_long(): void
    {
        $this->userData["name"] = 'Dr. Charlene Witting Jackson Datoca DDS Jr.';
        $response = $this->postJson('/api/users',$this->userData);
        $response->assertJsonValidationErrorFor("name");
    }
    public function test_user_destroy_return_a_succesful_response(): void {
        $response = $this->deleteJson('/api/users/' . $this->user[0]->id);
        $response->assertStatus(204);
    }

    public function test_user_update_return_a_succesfull_response(): void {
        $resposne = $this->putJson(('/api/users/'. $this->user[0]->id), $this->userData);
        $resposne->assertStatus(200);
    }
}
