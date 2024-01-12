<?php

namespace Tests\Feature\Models\Label;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;


    public function testCreatePageThatCanBeRendered(): void
    {
        $response = $this->get('/labels/create');
        $response->assertStatus(200);
    }

    public function testCreateLabel(): void
    {
        $label = Label::factory()->create();
        $label->save();
        $params = ['name' => 'make', 'description' => 'make some'];

        $response = $this->post('/labels', $params);

        $response->assertStatus(302);
        $response->assertRedirect('/labels');
        $this->assertDatabaseHas('labels', $params);
    }

    public function testCreateEmptyLabels(): void
    {
        $label = Label::factory()->create();
        $label->save();
        $params = ['name' => '', 'description' => 'make some'];

        $response = $this->from('/labels/create')->post('/labels', $params);

        $response->assertStatus(302);
        $response->assertRedirect('/labels/create');
        $response->assertSessionHasErrors(['name']);
    }
}
