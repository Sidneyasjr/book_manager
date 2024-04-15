<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_author_can_be_created()
    {
        $author = Author::create(['name' => 'John Doe']);
        $this->assertInstanceOf(Author::class, $author);
    }

    public function test_author_can_be_updated()
    {
        $author = Author::factory()->create();
        $author->update(['name' => 'John Doe']);
        $this->assertDatabaseHas('authors', ['name' => 'John Doe']);
    }

    public function test_author_can_be_deleted()
    {
        $author = Author::factory()->create();
        $author->delete();
        $this->assertDatabaseMissing('authors', $author->toArray());
    }

    public function test_author_can_have_books()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);
        $this->assertInstanceOf(Book::class, $author->books->first());
    }

    public function test_author_can_have_many_books()
    {
        $author = Author::factory()->create();
        $books = Book::factory()->count(3)->create(['author_id' => $author->id]);
        $this->assertEquals(3, $author->books->count());
    }

}
