<?php

namespace Tests\Feature\Status;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    public function testDeleteStatus():void
    {
        $status = TaskStatus::factory()->create();
        $response = $this->delete(route('taskStatuses.destroy',$status));

        $response->assertStatus(302);

        $status2 = TaskStatus::find($status->id);
        $this->assertNull($status2);
    }

    public function testDeleteStatusIfTaskHaveThatStatus():void
    {
        $status = TaskStatus::factory()->create();
        $task = Task::factory()->create();
        $task->status_id = $status->id;
        $task->save();
        $status->save();
        $response = $this->delete(route('taskStatuses.destroy',$status));
        $response->assertStatus(302);

        $status2 = TaskStatus::find($status->id);
        $this->assertNotNull($status2);
    }

}


