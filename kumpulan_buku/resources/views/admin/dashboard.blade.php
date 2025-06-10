@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-5 py-4">
            <div>
                <h1 class="display-8 fw-bold text-gradient-vibrant">DASHBOARD BUKU</h1>
                <p class="text-muted mb-0">Kelola koleksi literasi digital Anda</p>
            </div>
            <a href="{{ route('admin.books.create') }}" class="btn btn-glow-pink">
                <i class="bi bi-plus-lg me-2"></i>Tambah Buku
            </a>
        </div>

        <!-- Main Content -->
        <div class="card rainbow-hover-effect">
            <div class="card-header bg-gradient-purple text-white py-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-bookmarks-fill me-2"></i>Koleksi Terbaru</h4>
                    <span class="badge bg-white text-purple fs-6">
                        {{ $recentBooks->total() }} Buku Terdaftar
                    </span>
                </div>
            </div>

            <div class="card-body p-0">
                @if($recentBooks->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-soft-purple">
                                <tr>
                                    <th class="ps-4" style="width: 100px">Cover</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Input</th>
                                    <th class="text-end pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentBooks as $book)
                                    <tr class="hover-highlight">
                                        <td class="ps-4">
                                            <div class="cover-art">
                                                @if($book->cover)
                                                    <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid rounded-4"
                                                        alt="{{ $book->title }}" style="width: 80px; height: 100px; object-fit: cover">
                                                @else
                                                    <div class="no-cover-art d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-journal-text fs-3 text-white"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 fw-bold">{{ Str::limit($book->title, 30) }}</h6>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-person-badge text-primary"></i>
                                                {{ $book->author }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-rainbow">
                                                {{ $book->category->name ?? '-' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="text-nowrap">
                                                {{ $book->created_at->isoFormat('DD MMM YYYY') }}
                                            </div>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="d-flex gap-2 justify-content-end">
                                                <a href="{{ route('admin.books.edit', $book->id) }}"
                                                    class="btn btn-sm btn-soft-warning rounded-pill px-3" title="Edit">
                                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-soft-danger rounded-pill px-3"
                                                        onclick="return confirm('Hapus buku {{ $book->title }}?')">
                                                        <i class="bi bi-trash me-1"></i>Hapus
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
                    <div class="pagination-wrapper px-4 py-3">
                        {{ $recentBooks->onEachSide(1)->links() }}
                    </div>
                @else
                    <div class="empty-state text-center py-6">
                        <div class="empty-state-icon mb-4">
                            <i class="bi bi-journal-plus display-2 text-purple"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Mari Mulai Petualangan Bukumu!</h3>
                        <p class="text-muted mb-4">Tambahkan buku pertama untuk mengisi rak digital</p>
                        <a href="{{ route('admin.books.create') }}" class="btn btn-glow-pink px-5 rounded-pill">
                            <i class="bi bi-magic me-2"></i>Tambah Buku
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        :root {
            --purple-gradient: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
            --rainbow-gradient: linear-gradient(90deg,
                    #ec4899 0%,
                    #f472b6 25%,
                    #818cf8 50%,
                    #60a5fa 75%,
                    #34d399 100%);
        }

        .text-gradient-vibrant {
            background: var(--rainbow-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-gradient-purple {
            background: var(--purple-gradient);
            border-radius: 12px 12px 0 0;
        }

        .btn-glow-pink {
            background: linear-gradient(135deg, #ec4899 0%, #f472b6 100%);
            border: none;
            color: white;
            padding: 12px 28px;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-glow-pink:hover {
            box-shadow: 0 0 20px rgba(236, 72, 153, 0.4);
            transform: translateY(-2px);
        }

        .bg-soft-purple {
            background-color: rgba(139, 92, 246, 0.08);
        }

        .hover-highlight:hover {
            background-color: rgba(139, 92, 246, 0.05);
        }

        .cover-art {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .no-cover-art {
            width: 80px;
            height: 100px;
            background: var(--purple-gradient);
            border-radius: 12px;
        }

        .badge.bg-rainbow {
            background: var(--rainbow-gradient);
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 600;
        }

        .rainbow-hover-effect {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .rainbow-hover-effect:hover {
            box-shadow: 0 15px 30px rgba(139, 92, 246, 0.1);
        }

        .rounded-4 {
            border-radius: 16px !important;
        }

        .btn-soft-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .btn-soft-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }
    </style>
@endsection