<?php

namespace Tests\Feature\Models\Mark;

use App\Models\Mark;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

      public function testDeleteMarkIsNotInTasks():void
    {
        $mark = Mark::factory()->create();
        $mark->save();

        $response = $this->delete(route('marks.destroy',$mark));
        $response->assertStatus(302);

        $mark2 = Task::find($mark->id);
        $this->assertNull($mark2);
    }

    public function testDeleteMarkIsInTasks():void
    {
        $task = Task::factory()->create();
        $mark = Mark::factory()->create();
        $task->marks()->attach($mark);
        $task->save();
        $mark->save();

        $response = $this->delete(route('marks.destroy',$mark));
        $response->assertStatus(302);

        $mark2 = Task::find($mark->id);
        $this->assertNotNull($mark2);
    }

}


