<?php

namespace Tests\Feature;

use App\Model\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function stores_post()
    {
        $user = create(User::class);

        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 200),
            'author_id' => $user->id,
        ];

        $response = $this->json('POST', $this->baseUrl . "posts", $data);

        $response->assertStatus(201);
        //Si se guardo en la bd
        $this->assertDatabaseHas('posts', $data);
        $post = Post::all()->first();

        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title
            ]
        ]);
    }

    /**
     * @test
     */

    public function delete_post()
    {
        create(User::class);
        $post = create(Post::class);

        $this->json('DELETE', $this->baseUrl . "posts/{$post->id}")
            ->assertStatus(204);
        $this->assertNull(Post::find($post->id));

    }

    /**
     * @test
     */

    public function update_post()
    {
        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 200)
        ];
        create(User::class);
        $post = create(Post::class);

        $response = $this->json('PUT', $this->baseUrl . "posts/{$post->id}", $data);
        $response->assertStatus(200);

        $post = $post->fresh();

        $this->assertEquals($post->title, $data['title']);
        $this->assertEquals($post->content, $data['content']);

    }

    /**
     * @test
     */

    public function shows_post()
    {
        create(User::class);
        $post = create(Post::class);
        $response = $this->json('GET', $this->baseUrl . "posts/{$post->id}");
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title
            ]
        ]);
    }
}
