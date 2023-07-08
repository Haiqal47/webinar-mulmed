@extends('layouts.app', ['active' => 'home'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('books.index') }}" class="btn btn-primary">Show All Books</a>
                        <a href="{{ route('books.my-books') }}" class="btn btn-primary">Show My Books</a>
                        <a href="{{ route('authors.index') }}" class="btn btn-primary">Show My Author Book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
