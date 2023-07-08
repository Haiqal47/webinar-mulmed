@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>{{ $book->title }}</h1>
            <br>
            <h3>{{ $book->author->name }}</h3>
            <br>
            <h5>{{ $book->description }}</h5>
            <br>
            <p>Year: {{ $book->year }}</p>
            <br>
            <p>Publisher: {{ $book->publisher }}</p>
            <br>
            <p>Language: {{ $book->language }}</p>
            <br>
            <p>Volume: {{ $book->volume }}</p>
            <br>
            <p>Pages: {{ $book->pages }}</p>
            <br>
            @can('update', $book)
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
            @endcan
            @can('delete', $book)
                <form class="d-inline" action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            @endcan
            @if (!$book->users->contains(Auth::user()))
                <form class="d-inline p-0 mt-1" action="{{ route('books.add', $book->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button class="btn btn-dark w-100">Add to My Books</button>
                </form>
            @else
                <form class="d-inline p-0 mt-1" action="{{ route('books.remove', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-dark w-100">Remove from My Books</button>
                </form>
            @endif
        </div>
    </div>
@endsection
