<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_fetch_books()
    {
        $response = $this->authenticate()->get('/api/books');
        $response->assertStatus(200);
    }

    public function test_can_create_book()
    {
        $author = Author::create(['name' => 'John Doe']);
        $response = $this->authenticate()->post('/api/books', [
            'title' => 'The Great Gatsby',
            'author_id' => $author->id,
        ]);
        $response->assertStatus(201);
    }

    public  function  test_not_can_create_book()
    {
        $response = $this->authenticate()->post('/api/books', [
            'title' => 'The Great Gatsby',
            'author_id' => 999,
        ]);
        $response->assertStatus(422);
    }

    public function test_can_fetch_book()
    {
        $book = Book::factory()->create();
        $response = $this->authenticate()->get('/api/books/' . $book->id);
        $response->assertStatus(200);
    }

    public function test_can_update_book()
    {
        $author = Author::create(['name' => 'John Doe']);
        $book = Book::factory()->create();
        $response = $this->authenticate()->put('/api/books/' . $book->id, [
            'title' => 'The Great Gatsby',
            'author_id' => $author->id,
        ]);
        $response->assertStatus(200);
    }

    public function test_can_delete_book()
    {
        $book = Book::factory()->create();
        $response = $this->authenticate()->delete('/api/books/' . $book->id);
        $response->assertStatus(200);
    }
}
