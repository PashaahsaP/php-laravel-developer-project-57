<?php

namespace Tests\Feature\Models\Status;

use App\Models\TaskStatus;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatePageThatCanBeRendered():void
    {
        $status = TaskStatus::factory()->create();
        $response = $this->get(route('task_statuses.edit',$status));
        $response->assertStatus(200);
    }

    public function testEditPageThatUpdateCorrectly():void
    {
        $status = TaskStatus::factory()->create();
        $params = [
            'name' => 'pavel',
        ];

        $response = $this->patch(route('task_statuses.update', $status), $params);
        $response->assertStatus(302);
        $response->assertRedirect('/task_statuses');

        $this->assertDatabaseHas('task_statuses', [
            'id' => $status->id,
            'name' => 'pavel'
        ]);
    }

    public function testEditPageThatUpdateWithoutData():void
    {
        $status = TaskStatus::factory()->create();
        $params = [
            'name' => '',
        ];

        $response = $this->from(route('task_statuses.edit',$status))
                         ->patch(route('task_statuses.update', $status), $params);
        $response->assertStatus(302);
        $response->assertRedirect(route('task_statuses.edit',$status));

        $response->assertSessionHasErrors();

    }
}
