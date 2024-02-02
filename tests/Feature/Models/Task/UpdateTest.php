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

class UpdateTest extends TestCase
{
    use RefreshDatabase;


    public function testEditPageThatCanBeRendered(): void
    {
        $task = Task::factory()->create();
        $task->save();
        $response = $this->get("tasks/{$task->id}/edit");
        $response->assertStatus(200);
    }

    // public function testPatchTask(): void
    // {
    //     $user = User::factory()->create();
    //     $task = Task::factory()->create();
    //     $status = TaskStatus::factory()->create();
    //     $task->created_by_id = $user->id;
    //     $task->assigned_to_id = $user->id;
    //     $task->status_id = $status->id;
    //     $user->save();
    //     $task->save();
    //     $status->save();
    //     Auth::shouldReceive('id')->andReturn($user->id);

    //     $params = [
    //         'name' => $task->name,
    //         'description' => 'some',
    //         'status_id' => $task->status()->get()->id,
    //         'created_by_id' => $task->author()->get()->id,
    //         'assigned_to_id' => $task->executor()->get()->id
    //     ];

    //     $response = $this->from(route('tasks.edit', $task))->patch(route('tasks.update', $task), $params);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/tasks');

    //     $this->assertDatabaseHas('tasks', $params);
    // }

    // public function testPatchEmptyTask(): void
    // {
    //     $user = User::factory()->create();
    //     $task = Task::factory()->create();
    //     $status = TaskStatus::factory()->create();
    //     $task->created_by_id = $user->id;
    //     $task->assigned_to_id = $user->id;
    //     $task->status_id = $status->id;
    //     $user->save();
    //     $task->save();
    //     $status->save();
    //     Auth::shouldReceive('id')->andReturn($user->id);

    //     $params = [
    //         'name' => '',
    //         'description' => 'some',
    //         'status_id' => '',
    //         'created_by_id' => '',
    //         'assigned_to_id' => $task->executor()->get()[0]->id
    //     ];

    //     $response = $this->from(route('tasks.edit', $task))->patch(route('tasks.update', $task), $params);
    //     $response->assertStatus(302);
    //     $response->assertSessionHasErrors(['name', 'created_by_id', 'status_id']);
    //     $response->assertRedirect(route('tasks.edit', $task));
    // }
}
