<?php

namespace Tests\Feature\Models\Status;

use App\Models\TaskStatus;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatePageThatCanBeRendered():void
    {
        $response = $this->get('/task_statuses/create');
        $response->assertStatus(200);

    }

    public function testCreateTaskStatus():void
    {
        $status = TaskStatus::factory()->create();

        $response = $this->post('/task_statuses', [
            'name' => $status->name,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/task_statuses');
    }

    public function testCreateEmptyTaskStatus():void
    {
        $response = $this->from('/task_statuses/create')->post('/task_statuses', [
            'name' => "",
        ]);

        $response->assertSessionHasErrors('name');
        $response->assertRedirect('/task_statuses/create');
    }
}
