<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'pages',
        'year',
        'publisher',
        'language',
        'volume',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_books', 'book_id', 'user_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function mapUserBooks($myBooks, $books)
    {
        return $books = $books->map(function ($book) use ($myBooks) {
            $book->is_added = $myBooks->contains($book);
            return $book;
        });
    }
}
