@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-back">
                <i class="bi bi-arrow-left-circle me-2"></i>Kembali ke Koleksi
            </a>
        </div>

        <div class="book-detail-container">
            <!-- Cover Section -->
            <div class="cover-wrapper rounded-4 shadow-lg overflow-hidden">
                @if($book->cover)
                    <img src="{{ asset('storage/' . $book->cover) }}" class="detail-cover-img" alt="{{ $book->title }}"
                        loading="lazy">
                @else
                    <div class="placeholder-cover d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-book text-muted display-2"></i>
                        <span class="text-muted mt-2">Cover Tidak Tersedia</span>
                    </div>
                @endif
            </div>

            <!-- Content Section -->
            <div class="content-wrapper shadow-lg rounded-4">
                <div class="content-header">
                    <span class="category-badge bg-primary text-white">{{ $book->category->name }}</span>
                    <span class="publish-date">
                        <i class="bi bi-calendar2-check"></i>
                        {{ $book->created_at->isoFormat('D MMMM Y') }}
                    </span>
                </div>

                <h1 class="book-title display-4 fw-bold">{{ $book->title }}</h1>
                <h2 class="author text-muted mb-4">
                    <i class="bi bi-person-square"></i>
                    {{ $book->author }}
                </h2>

                <div class="description-block">
                    <h3 class="section-title"><i class="bi bi-journal-text"></i> Deskripsi Buku</h3>
                    <p class="description-text">{{ $book->description }}</p>
                </div>

                @if($relatedBooks->count() > 0)
                    <div class="related-books-section">
                        <h4 class="section-title mb-4"><i class="bi bi-bookmarks"></i> Buku Terkait</h4>
                        <div class="related-books-grid">
                            @foreach($relatedBooks as $relatedBook)
                                <a href="{{ route('admin.books.show', $relatedBook) }}" class="related-book-card">
                                    <div class="card h-100 border-0 shadow-hover">
                                        @if($relatedBook->cover)
                                            <img src="{{ asset('storage/' . $relatedBook->cover) }}" class="card-img-top related-cover"
                                                alt="{{ $relatedBook->title }}">
                                        @else
                                            <div class="related-placeholder">
                                                <i class="bi bi-journal-text"></i>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h5 class="related-title">{{ $relatedBook->title }}</h5>
                                            <p class="related-author">{{ $relatedBook->author }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .btn-back {
            background: linear-gradient(135deg, #6c757d, #5a6268);
            color: white !important;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateX(-5px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        }

        .book-detail-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .cover-wrapper {
            height: 500px;
            background: #f8f9fa;
            position: relative;
        }

        .detail-cover-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .placeholder-cover {
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #e9ecef, #dee2e6);
        }

        .content-wrapper {
            background: white;
            padding: 2.5rem;
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .content-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .category-badge {
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .publish-date {
            color: #6c757d;
            font-size: 0.95rem;
        }

        .book-title {
            color: #2c3e50;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .author {
            font-size: 1.25rem;
            letter-spacing: 0.5px;
        }

        .description-block {
            margin: 3rem 0;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 15px;
        }

        .section-title {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .description-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #495057;
            text-align: justify;
        }

        .related-books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .related-book-card {
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease;
        }

        .shadow-hover {
            transition: all 0.3s ease;
        }

        .related-book-card:hover .shadow-hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .related-cover {
            height: 250px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .related-placeholder {
            height: 250px;
            background: #e9ecef;
            display: grid;
            place-items: center;
            color: #6c757d;
        }

        .related-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .related-author {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0;
        }

        @media (min-width: 992px) {
            .book-detail-container {
                grid-template-columns: 400px 1fr;
                align-items: start;
            }

            .content-wrapper {
                top: 0;
                margin-bottom: 0;
            }
        }
    </style>
@endsection