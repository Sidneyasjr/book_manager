<?php

namespace Tests\Feature;

use App\Models\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_authors()
    {
        $response = $this->authenticate()->get('/api/authors');
        $response->assertStatus(200);
    }

    public function test_can_create_author()
    {
        $response = $this->authenticate()->post('/api/authors', [
            'name' => 'John Doe',
        ]);
        $response->assertStatus(201);
    }

    public function test_can_fetch_author()
    {
        $author = Author::factory()->create();
        $response = $this->authenticate()->get('/api/authors/' . $author->id);
        $response->assertStatus(200);
    }

    public function test_can_update_author()
    {
        $author = Author::factory()->create();
        $response = $this->authenticate()->put('/api/authors/' . $author->id, [
            'name' => 'Jane Doe',
        ]);
        $response->assertStatus(200);
    }

    public function test_can_delete_author()
    {
        $author = Author::factory()->create();
        $response = $this->authenticate()->delete('/api/authors/' . $author->id);
        $response->assertStatus(200);
    }

}
