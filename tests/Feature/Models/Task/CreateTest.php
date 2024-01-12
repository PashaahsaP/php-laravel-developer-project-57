<?php

namespace Tests\Feature\Models\Task;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;


    public function testCreatePageThatCanBeRendered():void
    {
        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);

    }

    public function testCreatePageThatCanBeRenderedWithStatuts():void
    {
        TaskStatus::factory()->create()->save();
        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);

    }

    public function testCreateTask():void
    {
        $status = TaskStatus::factory()->create();
        $user = User::factory()->create();
        $status->save();
        $user->save();

        Auth::shouldReceive('id')->andReturn($user->id);

        $response = $this->post('/tasks', [
            'id' => 1,
            'name' => $status->name,
            'description' => 'some',
            'status_id' => $status->id,
            'author_id' => $status->id
        ]);

        $response->assertStatus(302);

        $response->assertRedirect('/tasks');

    }

    public function testCreateEmptyTask():void
    {
        $status = TaskStatus::factory()->create();
        $user = User::factory()->create();

        Auth::shouldReceive('id')->andReturn($user->id);
        $response =  $this->from('tasks/create')->post('tasks', [
            'id' => 1,
            'name' => '',
            'description' => 'some',
            'status_id' => '',
            'author_id' => $status->id
        ]);

        $response->assertSessionHasErrors(['name','status_id']);
        $response->assertStatus(302);
        $response->assertRedirect('tasks/create');

    }
}
