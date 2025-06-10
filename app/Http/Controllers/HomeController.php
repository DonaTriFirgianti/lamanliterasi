<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $books = Book::with('category')
            ->where('is_published', true)
            ->paginate(9);

        return view('home', [
            'books' => $books,
            'showAdminLinks' => false
        ]);
    }

    public function show(Book $book)
    {
        // Pastikan buku dipublikasikan
        if (!$book->is_published) {
            abort(404);
        }

        return view('books.show', [
            'book' => $book->load('category', 'user'),
            'relatedBooks' => Book::where('category_id', $book->category_id)
                ->where('id', '!=', $book->id)
                ->where('is_published', true)
                ->limit(4)
                ->get()
        ]);
    }
}