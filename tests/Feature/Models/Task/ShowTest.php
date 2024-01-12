<?php

namespace Tests\Feature\Models\Task;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;


    public function testCreatePageThatCanBeRendered(): void
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.show', $task));
        $response->assertStatus(200);
    }
}
