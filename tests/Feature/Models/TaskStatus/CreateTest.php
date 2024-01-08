<?php

namespace Tests\Feature\Status;

use App\Models\TaskStatus;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatePageThatCanBeRendered():void
    {
        $response = $this->get('/taskStatuses/create');
        $response->assertStatus(200);

    }

    // public function testCreateTaskStatus():void
    // {

    // }


    // public function test_users_can_authenticate_using_the_login_screen(): void
    // {
    //     $user = User::factory()->create();

    //     $response = $this->post('/login', [
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ]);

    //     $this->assertAuthenticated();
    //     $response->assertRedirect('/');
    // }

    // public function test_users_can_not_authenticate_with_invalid_password(): void
    // {
    //     $user = User::factory()->create();

    //     $this->post('/login', [
    //         'email' => $user->email,
    //         'password' => 'wrong-password',
    //     ]);

    //     $this->assertGuest();
    // }

    // public function test_users_can_logout(): void
    // {
    //     $user = User::factory()->create();

    //     $response = $this->actingAs($user)->post('/logout');

    //     $this->assertGuest();
    //     $response->assertRedirect('/');
    // }
}
