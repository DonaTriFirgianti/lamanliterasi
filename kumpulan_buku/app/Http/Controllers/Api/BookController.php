<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        try {
            $books = Book::with('category')->paginate(10);
            return response()->json([
                'status' => 'success',
                'data' => $books
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $book = Book::with('category')->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $book
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'author' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'description' => 'required',
                'cover' => 'nullable|image|max:2048'
            ]);

            $validated['user_id'] = auth()->id();

            if ($request->hasFile('cover')) {
                $validated['cover'] = $request->file('cover')->store('book-covers', 'public');
            }

            $book = Book::create($validated);

            return response()->json([
                'status' => 'success',
                'data' => $book
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);

            $validated = $request->validate([
                'title' => 'sometimes|max:255',
                'author' => 'sometimes|max:255',
                'category_id' => 'sometimes|exists:categories,id',
                'description' => 'sometimes',
                'cover' => 'nullable|image|max:2048'
            ]);

            if ($request->hasFile('cover')) {
                if ($book->cover)
                    Storage::disk('public')->delete($book->cover);
                $validated['cover'] = $request->file('cover')->store('book-covers', 'public');
            }

            $book->update($validated);

            return response()->json([
                'status' => 'success',
                'data' => $book
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);

            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }

            $book->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Book deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getByCategory($categoryId)
    {
        try {
            $books = Book::with('category')
                ->where('category_id', $categoryId)
                ->paginate(10);

            return response()->json([
                'status' => 'success',
                'data' => $books
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}