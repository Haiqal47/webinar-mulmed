<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    private $bookService;

    public function __construct()
    {
        $this->bookService = new BookService();
    }

    function index()
    {
        $books = $this->bookService->getBooks();
        return view('books.index', compact('books'));
    }

    function create()
    {
        return view('books.create');
    }

    function store(BookRequest $request)
    {
        $this->bookService->createBook($request);
        return redirect()->route('books.index');
    }

    function show(Book $book)
    {
        $book = $book->with(['users', 'author']);
        return view('books.show', compact('book'));
    }

    function edit(Request $request, Book $book)
    {
        if ($request->user()->cannot('update', $book)) {
            abort(403);
        }
        return view('books.edit', compact('book'));
    }

    function update(BookRequest $request, Book $book)
    {
        if ($request->user()->cannot('update', $book)) {
            abort(403);
        }
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    function destroy(Request $request, Book $book)
    {
        if ($request->user()->cannot('delete', $book)) {
            abort(403);
        }
        $book->delete();
        return redirect()->route('books.index');
    }

    function myBooks(Request $request)
    {
        $books = $this->bookService->getMyBooks($request);
        return view('books.my-books', compact('books'));
    }

    function add(Book $book)
    {
        $book->users()->attach(auth()->user()->id);
        return redirect()->back();
    }

    function remove(Book $book)
    {
        $book->users()->detach(auth()->user()->id);
        return redirect()->back();
    }

    function showMyAuthor()
    {
        $books = auth()->user()->books;
        return view('books.author-books', compact('books'));
    }
}
