<?php

namespace Tests\Feature\Models\TaskStatus;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;


    public function testCreatePageThatCanBeRendered(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertStatus(200);
    }
}
