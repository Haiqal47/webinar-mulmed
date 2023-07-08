<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AuthorBookPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book): Response
    {
        return $user->id === $book->author_id
            ? Response::allow()
            : Response::deny('You do not own this book.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book): Response
    {
        return $user->id === $book->author_id
            ? Response::allow()
            : Response::deny('You do not own this book.');
    }
}
