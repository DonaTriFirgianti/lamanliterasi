<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->paginate(9);
        return view('home', compact('books'));
    }
}