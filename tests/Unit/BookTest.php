<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Author;
use App\Models\Book;

class BookTest extends TestCase
{

    use RefreshDatabase;
    public function test_book_can_be_created(): void
    {
        $author = Author::create(['name' => 'John Doe']);
        $bookData = [
            'title' => 'Test Book',
            'author_id' => $author->id,
        ];

        $book = Book::create($bookData);

        $this->assertInstanceOf(Book::class, $book);
    }

    public function test_book_can_be_updated(): void
    {
        $author = Author::create(['name' => 'John Doe']);
        $book = Book::create([
            'title' => 'Test Book',
            'author_id' => $author->id,
        ]);

        $book->update(['title' => 'Updated Book']);

        $this->assertDatabaseHas('books', ['title' => 'Updated Book']);
    }

    public function test_book_can_be_deleted(): void
    {
        $author = Author::create(['name' => 'John Doe']);
        $book = Book::create([
            'title' => 'Test Book',
            'author_id' => $author->id,
        ]);

        $book->delete();

        $this->assertDatabaseMissing('books', $book->toArray());
    }

    public function test_book_belongs_to_author(): void
    {
        $author = Author::create(['name' => 'John Doe']);
        $book = Book::create([
            'title' => 'Test Book',
            'author_id' => $author->id,
        ]);

        $this->assertInstanceOf(Author::class, $book->author);
    }

}
