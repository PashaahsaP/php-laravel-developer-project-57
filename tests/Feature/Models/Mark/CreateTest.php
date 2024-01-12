<?php

namespace Tests\Feature\Models\Mark;

use App\Models\Mark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;


    public function testCreatePageThatCanBeRendered():void
    {
        $response = $this->get('/marks/create');
        $response->assertStatus(200);

    }

    public function testCreateMark():void
    {
        $mark = Mark::factory()->create();
        $mark->save();
        $params = ['name'=>'make','description' => 'make some'];

        $response = $this->post('/marks', $params);

        $response->assertStatus(302);
        $response->assertRedirect('/marks');
        $this->assertDatabaseHas('marks', $params);

    }

    public function testCreateEmptyMarks():void
    {
        $mark = Mark::factory()->create();
        $mark->save();
        $params = ['name'=>'','description' => 'make some'];

        $response = $this->from('/marks/create')->post('/marks', $params);

        $response->assertStatus(302);
        $response->assertRedirect('/marks/create');
        $response->assertSessionHasErrors(['name']);


    }
}
