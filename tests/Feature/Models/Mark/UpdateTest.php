<?php

namespace Tests\Feature\Models\Label;

use App\Models\Label;
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
        $label = Label::factory()->create();
        $label->save();
        $response = $this->get("labels/{$label->id}/edit");
        $response->assertStatus(200);
    }

    public function testPatchTask(): void
    {
        $label = Label::factory()->create();
        $label->save();

        $params = [
            'name' => $label->name,
            'description' => 'some',
        ];

        $response = $this->from(route('labels.edit', $label))->patch(route('labels.update', $label), $params);
        $response->assertStatus(302);
        $response->assertRedirect('/labels');
        $this->assertDatabaseHas('labels', $params);
    }

    public function testPatchEmptyTask(): void
    {
        $label = Label::factory()->create();
        $label->save();

        $params = [
            'name' => '',
            'description' => 'some',
        ];

        $response = $this->from(route('labels.edit', $label))->patch(route('labels.update', $label), $params);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
        $response->assertRedirect(route('labels.edit', $label));
    }
}
