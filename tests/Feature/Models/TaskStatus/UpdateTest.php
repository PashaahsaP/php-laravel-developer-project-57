<?php

namespace Tests\Feature\Status;

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
        $response = $this->get(route('taskStatuses.edit',$status));
        $response->assertStatus(200);
    }

//  $comment = ArticleComment::factory()->create();
//     $params = [
//         'content' => 'b',
//     ];
//     $response = $this->patch(route('articles.comments.update', [$comment->article, $comment]), $params);
//     $response->assertStatus(302);
//     $response->assertSessionHasErrors();

//     $this->assertDatabaseHas('article_comments', [
//         'id' => $comment->id,
//         'content' => $comment->content
//     ]);
}
