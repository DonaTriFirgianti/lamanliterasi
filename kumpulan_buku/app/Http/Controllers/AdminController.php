<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Book::query()->with('category');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('author', 'like', "%$search%");
            });
        }

        $recentBooks = $query->paginate(10);
        $totalBooks = Book::count();

        return view('admin.dashboard', compact('totalBooks', 'recentBooks'));
    }
}