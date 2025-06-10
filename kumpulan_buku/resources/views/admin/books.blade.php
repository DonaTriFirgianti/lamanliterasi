@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Kelola Buku</h1>

        <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Buku Baru
        </a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>
                                @if($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" width="50" class="rounded">
                                @else
                                    <span class="text-muted">No Cover</span>
                                @endif
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus buku ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $books->links() }}
        </div>
    </div>

    <style>
        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-group .btn {
            margin-right: 5px;
        }
    </style>
@endsection