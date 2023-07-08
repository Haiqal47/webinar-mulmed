<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\BookService;

class TestController extends Controller
{

    public $bookService;

    public function __construct()
    {
        $this->bookService = new BookService();
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return response()->json($books, 200);
    }

    public function store(BookRequest $request)
    {
        $this->bookService->createBook($request);
    }
}
