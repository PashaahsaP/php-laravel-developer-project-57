<?php

namespace Tests\Feature\Models\Label;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    public function testDeleteLabelIsNotInTasks(): void
    {
        $label = Label::factory()->create();
        $label->save();

        $response = $this->delete(route('labels.destroy', $label));
        $response->assertStatus(302);

        $label2 = Task::find($label->id);
        $this->assertNull($label2);
    }

    public function testDeleteLabelIsInTasks(): void
    {
        $task = Task::factory()->create();
        $label = Label::factory()->create();
        $task->labels()->attach($label);
        $task->save();
        $label->save();

        $response = $this->delete(route('labels.destroy', $label));
        $response->assertStatus(302);

        $label2 = Task::find($label->id);
        $this->assertNotNull($label2);
    }
}
