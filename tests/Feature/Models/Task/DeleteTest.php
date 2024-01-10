<?php

namespace Tests\Feature\Models\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

      public function testDeleteTaskByAuthor():void
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $task->author_id = $user->id;
        $user->save();
        $task->save();
        Auth::shouldReceive('id')->andReturn($user->id);

        $response = $this->delete(route('tasks.destroy',$task));
        $response->assertStatus(302);

        $task2 = Task::find($task->id);
        $this->assertNull($task2);
    }

    public function testDeleteTaskByOther():void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $task = Task::factory()->create();
        $task->author_id = $user->id;
        $user->save();
        $task->save();
        Auth::shouldReceive('id')->andReturn($user2->id);

        $response = $this->delete(route('tasks.destroy',$task));
        $response->assertStatus(302);

        $task2 = Task::find($task->id);
        $this->assertNotNull($task2);
    }

}


