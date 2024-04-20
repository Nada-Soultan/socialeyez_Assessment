<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class TaskTest extends TestCase
{
    
    use RefreshDatabase;

    public function test_task_creation()
    {
        $data = [
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'completed' => false,
        ];

        $response = $this->post('/tasks', $data);

        $this->assertDatabaseHas('tasks', $data);

        $response->assertRedirect('/tasks');
    }
}
