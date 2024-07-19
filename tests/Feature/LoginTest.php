<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_i_can_authenticate(): void
    {
        User::factory()->create([
            "email" => "example@gmail.com",
            "password" => Hash::make("1234"),
        ]);

        $payload = [
            "email" => "example@gmail.com",
            "password" => "1234",
        ];

        $response = $this->post('/api/login', $payload);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "token"
        ]);
    }

    public function test_i_cant_authenticate_with_invalid_data(): void
    {
        User::factory()->create([
            "email" => "example@gmail.com",
            "password" => Hash::make("1234"),
        ]);

        $payload = [
            "email" => "example@gmail.com",
            "password" => "45454",
        ];

        $response = $this->post('/api/login', $payload);

        $response->assertStatus(400);

        $response->assertJsonStructure([
            "error"
        ]);
    }
}
