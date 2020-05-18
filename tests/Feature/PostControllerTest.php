<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase {

	use DatabaseMigrations;

    /** @test */
    public function user_guest_see_all(){

        // Arrange

        $posts = factory(\App\Post::class, 5)->create();

        // Act

        $response = $this->get(route('posts_path'));

        // Assert

        $response->assertStatus(200);

        foreach ($posts as $post) {
            $response->assertSee($post->title);
            $response->assertSee($post->user->name);
        }

    }

    /** @test */
    public function user_registred_see_all(){

        // Arrange

        $user = factory(\App\User::class)->create();

        \Auth::loginUsingId($user->id);

        $posts = factory(\App\Post::class, 5)->create();

        // Act

        $response = $this->get(route('posts_path'));

        // Assert

        $response->assertStatus(200);

        foreach ($posts as $post) {
            $response->assertSee($post->title);
            $response->assertSee($post->user->name);
        }

    }

}