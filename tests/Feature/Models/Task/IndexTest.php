<?php

namespace Tests\Feature\Models\Task;

use App\Models\Mark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;


    public function testCreatePageThatCanBeRendered():void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
    }


}
