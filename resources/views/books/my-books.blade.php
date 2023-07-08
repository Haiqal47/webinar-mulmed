@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Book List</h1>
        <a href="{{ route('books.index') }}" class="btn btn-success">Add My Books</a>
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
                        <form class="d-inline" action="{{ route('books.add', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark">Remove to My Books</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
