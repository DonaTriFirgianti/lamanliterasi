<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'user'])
            ->latest()
            ->paginate(9);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255|unique:books,title',
                'author' => 'required|max:255',
                'description' => 'required|min:20',
                'category_id' => 'required|exists:categories,id',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Upload cover
            if ($request->hasFile('cover')) {
                $validated['cover'] = $request->file('cover')->store('book-covers', 'public');
            }

            Book::create($validated + ['user_id' => auth()->id()]);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Buku berhasil ditambahkan!');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Gagal menambahkan buku: ' . $e->getMessage()
            ]);
        }
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|unique:books,title,' . $book->id,
            'author' => 'required|max:255',
            'description' => 'required|min:20',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->has('remove_cover')) {
            Storage::disk('public')->delete($book->cover);
            $validated['cover'] = null;
        }

        // Handle cover update
        if ($request->hasFile('cover')) {
            // Delete old cover if exists
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            $validated['cover'] = $request->file('cover')->store('book-covers', 'public');
        } else {
            // Keep existing cover if not updated
            $validated['cover'] = $book->cover;
        }

        $book->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Buku berhasil diperbarui');
    }

    public function show(Book $book)
    {
        // Ambil buku terkait (berdasarkan kategori yang sama)
        $relatedBooks = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->limit(2)
            ->get();

        return view('admin.books.show', compact('book', 'relatedBooks'));
    }

    public function destroy(Book $book)
    {
        // Delete cover file if exists
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Buku berhasil dihapus');
    }
}