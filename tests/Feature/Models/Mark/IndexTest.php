<?php

namespace Tests\Feature\Models\Label;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;


    public function testCreatePageThatCanBeRendered(): void
    {
        $response = $this->get(route('labels.index'));
        $response->assertStatus(200);
    }
}
