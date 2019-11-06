<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    /** @test */
    public function testExample()
    {
         // Arrange
        // Dodajmy do bazy danych wpis
        $post = Post::create([
            'title' => 'Wrabiał krowę w morderstwo cioci',
            'body' => 'Wrabiał krowę w morderstwo cioci',
            'category_id' => 1,
            'is_published' => 1,
            'user_id' => 1,
            'cover' => '/images/chicken-at-facebook.jpg',
            'slug' => Post::getUniqueSlug('Wrabiał krowę w morderstwo cioci')
        ]);

        // Act
        // Wykonajmy zapytanie pod adres wpisu
        $response = $this->get('/blog/show/' . $post->slug);

        // Assert
        // Sprawdźmy że w odpowiedzi znajduje się tytuł wpisu
        $response->assertStatus(200)
            ->assertSeeText('Wrabiał krowę w morderstwo cioci');
    }

    /** @test */
    public function a_user_can_read_all_the_posts()
    {
        //Given we have task in the database
        $post = factory(Post::class)->create();

        //When user visit the tasks page
        $response = $this->get('/blog/list');
        
        //He should be able to read the task
        $response->assertSee($post->title);
    }

    /** @test */
    public function a_user_can_read_single_post()
    {
        //Given we have task in the database
        $post = factory(Post::class)->create();
        //When user visit the task's URI
        $response = $this->get('/blog/show/'.$post->slug);
        //He can see the task details
        $response->assertSee($post->title)
            ->assertSee($post->body)
            ->assertSee($post->cover);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_post()
    {
        //Given we have an authenticated user
        $this->actingAs(factory(User::class)->create());
        //And a task object
        $post = factory(Post::class)->make();
        //When user submits post request to create task endpoint
        $this->post('/admin/posts/create', $post->toArray());
        //It gets stored in the database
        $this->assertEquals(1, Post::all()->count());
    }
}
