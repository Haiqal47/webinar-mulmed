@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Author Book List</h1>
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
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-success">Show</a>
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
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
