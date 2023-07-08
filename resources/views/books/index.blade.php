@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book List</h1>
        <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
        <br><br>
        <table class="table">
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>
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
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-success">Show</a>
                        @if (!$book->is_added)
                            <form class="d-inline" action="{{ route('books.add', $book->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="btn btn-dark">Add to My Books</button>
                            </form>
                        @else
                            <form class="d-inline" action="{{ route('books.remove', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark">Remove from My Books</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
