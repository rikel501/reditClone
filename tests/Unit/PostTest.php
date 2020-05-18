<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase{

	use DatabaseMigrations;

    /** @test */
    public function post_by_its_author(){

        // Arrange

    	$user = factory(\App\User::class)->create();
        $post = factory(\App\Post::class)->create(['user_id' => $user->id]);

        $postByAnotherUser = factory(\App\Post::class)->create();

        // Act

        $postByAuthor = $post->createdBy($user);

        $postByAnotherAuthor = $postByAnotherUser->createdBy($user);

        // Assert

        $this->assertTrue($postByAuthor);

        $this->assertFalse($postByAnotherAuthor);

    }

    /** @test */
    public function post_by_its_author_null(){

        // Arrange

        $post = factory(\App\Post::class)->create();

        // Act

        $postByAuthor = $post->createdBy(null);

        // Assert

        $this->assertFalse($postByAuthor);

    }

}
