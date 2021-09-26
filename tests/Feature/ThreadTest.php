<?php

namespace Tests\Feature;

use App\User;
use App\Thread;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    /**
     * Test index page as guest.
     *
     * @return void
     */
    public function testThreadListAsGuest()
    {
        $user = factory(User::class)->make();
        $user->save();

        $thread = factory(Thread::class)->make([
            'user_id' => $user->id,
        ]);
        $thread->save();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($thread->title);
        $response->assertDontSee('EDIT');
        $response->assertDontSee('DELETE');
        $response->assertDontSee('Create thread');
    }

    /**
     * Test index page as thread owner.
     *
     * @return void
     */
    public function testThreadListAsThreadOwner()
    {
        $user = factory(User::class)->make();
        $user->save();

        $thread = factory(Thread::class)->make([
            'user_id' => $user->id,
        ]);
        $thread->save();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee($thread->title);
        $response->assertSee('EDIT');
        $response->assertSee('DELETE');
        $response->assertSee('Create thread');
    }

    /**
     * Test index page as logged user.
     *
     * @return void
     */
    public function testThreadListAsLoggedUser()
    {
        $threadOwnerUser = factory(User::class)->make();
        $threadOwnerUser->save();

        $thread = factory(Thread::class)->make([
            'user_id' => $threadOwnerUser->id,
        ]);
        $thread->save();

        $loggedInUser = factory(User::class)->make();
        $loggedInUser->save();

        $response = $this->actingAs($loggedInUser)->get('/');

        $response->assertStatus(200);
        $response->assertSee($thread->title);
        $response->assertDontSee('EDIT');
        $response->assertDontSee('DELETE');
        $response->assertSee('Create thread');
    }
}
