<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function getBooks()
    {
        $books = Book::with('author')->get();
        $myBooks = auth()->user()->myBooks;
        $books = Book::mapUserBooks($myBooks, $books);
        return $books;
    }

    public function createBook($request)
    {
        auth()->user()->books()->create($request->all());
    }

    public function getMyBooks($request)
    {
        $books = $request->user()->myBooks()->with('author')->get();
        return $books;
    }

    public function getAllBooks()
    {
        $books = Book::with('author')->get();
        return $books;
    }
}
