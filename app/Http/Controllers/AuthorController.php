<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::when(request('name'), fn ($query, $title) => $query->where('name', 'like', "%$title%"))->paginate(10);
    }

    public function store(AuthorRequest $request)
    {
        return Author::create($request->validated());
    }

    public function show($id)
    {
        $author = Author::find($id);
        if (!$author){
            return response()->json(['message' => 'Author not found'], 404);
        }
        return $author;
    }

    public function update(AuthorRequest $request, $id)
    {
        $author = Author::find($id);
        if (!$author){
            return response()->json(['message' => 'Author not found'], 404);
        }
        $author->update($request->validated());

        return $author;
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author){
            return response()->json(['message' => 'Author not found'], 404);
        }
        $author->delete();

        return response()->json();
    }
}
