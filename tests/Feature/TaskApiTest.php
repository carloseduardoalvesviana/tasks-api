<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task(): void
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'New Task',
            'description' => 'Task Description',
            'completed' => false,
        ]);

        $response->assertStatus(201);

        $response->assertJson([
            'title' => 'New Task',
            'description' => 'Task Description',
            'completed' => false,
        ]);
    }

    public function test_can_list_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200);

        $response->assertJsonCount(3);
    }

    public function test_can_show_task()
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertStatus(200);

        $response->assertJson([
            'title' => $task->title,
            'description' => $task->description,
            'completed' => false,
        ]);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => 'Update Task',
            'description' => 'Update Description',
            'completed' => true,
        ]);

        $response->assertStatus(201);

        $response->assertJson([
            'title' => 'Update Task',
            'description' => 'Update Description',
            'completed' => true,
        ]);
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
