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

    public function testEditPageThatUpdateCorrectly():void
    {
        $status = TaskStatus::factory()->create();
        $params = [
            'name' => 'pavel',
        ];

        $response = $this->patch(route('taskStatuses.update', $status), $params);
        $response->assertStatus(302);
        $response->assertRedirect('/taskStatuses');

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

        $response = $this->from(route('taskStatuses.edit',$status))
                         ->patch(route('taskStatuses.update', $status), $params);
        $response->assertStatus(302);
        $response->assertRedirect(route('taskStatuses.edit',$status));

        $response->assertSessionHasErrors();

    }

    // $comment = ArticleComment::factory()->create();
    // $params = [
    //     'content' => 'b',
    // ];
    // $response = $this->patch(route('articles.comments.update', [$comment->article, $comment]), $params);
    // $response->assertStatus(302);
    // $response->assertSessionHasErrors();

    // $this->assertDatabaseHas('article_comments', [
    //     'id' => $comment->id,
    //     'content' => $comment->content
    // ]);

// public function testDestroy()
//     {
//         $comment = ArticleComment::factory()->create();
//         $response = $this->delete(route('articles.comments.destroy', [$comment->article, $comment]));
//         $response->assertStatus(302);

//         $comment2 = ArticleComment::find($comment->id);
//         $this->assertNull($comment2);
//     }
}
