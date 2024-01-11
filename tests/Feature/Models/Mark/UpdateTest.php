<?php

namespace Tests\Feature\Models\Mark;

use App\Models\Mark;
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


    public function testEditPageThatCanBeRendered():void
    {
        $mark = Mark::factory()->create();
        $mark->save();
        $response = $this->get("marks/{$mark->id}/edit");
        $response->assertStatus(200);

    }

    public function testPatchTask():void
    {
        $mark = Mark::factory()->create();
        $mark->save();

        $params =[
            'name' => $mark->name,
            'description' => 'some',
        ];

        $response = $this->from(route('marks.edit',$mark))->patch(route('marks.update', $mark), $params);
        $response->assertStatus(302);
        $response->assertRedirect('/marks');
        $this->assertDatabaseHas('marks', $params);
    }

    public function testPatchEmptyTask():void
    {
        $mark = Mark::factory()->create();
        $mark->save();

        $params =[
            'name' => '',
            'description' => 'some',
        ];

        $response = $this->from(route('marks.edit',$mark))->patch(route('marks.update', $mark), $params);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
        $response->assertRedirect(route('marks.edit',$mark));
    }
}
