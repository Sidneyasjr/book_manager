<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $query = Book::query()->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'authors.name as author');

        $query->when(request('title'), fn ($query, $title) => $query->where('title', 'like', "%$title%"));
        $query->when(request('author'), fn ($query, $author) => $query->where('authors.name', 'like', "%$author%"));

        return $query->paginate(10);
    }

    public function store(BookRequest $request)
    {
        return Book::create($request->validated());
    }

    public function show($id)
    {
        $book = Book::with('author')->find($id);
        if (!$book){
            return response()->json(['message' => 'Book not found'], 404);
        }
        return $book;
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::find($id);
        if (!$book){
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->update($request->validated());

        return $book;
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book){
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->delete();

        return response()->json();
    }
}
