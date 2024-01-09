<?php

namespace Tests\Feature\Status;

use App\Models\TaskStatus;
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

}


