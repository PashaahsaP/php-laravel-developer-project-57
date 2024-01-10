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
        $response = $this->get('/taskStatuses/create');
        $response->assertStatus(200);

    }

    public function testCreateTaskStatus():void
    {
        $status = TaskStatus::factory()->create();

        $response = $this->post('/taskStatuses', [
            'name' => $status->name,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/taskStatuses');
    }

    public function testCreateEmptyTaskStatus():void
    {
        $response = $this->from('/taskStatuses/create')->post('/taskStatuses', [
            'name' => "",
        ]);

        $response->assertSessionHasErrors('name');
        $response->assertRedirect('/taskStatuses/create');
    }
}
