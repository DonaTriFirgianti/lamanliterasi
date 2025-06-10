@extends('layouts.app')

@section('content')
    <div class="container py-9">
        <h1 class="text-center mb-5 mt-25 display-3 fw-bold text-gradient-primary">Literarium</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($books as $book)
                <div class="col">
                    <div class="card h-100 border-0 rounded-4 overflow-hidden glass-card effect-hover">
                        <a href="{{ route('admin.books.show', $book) }}" class="text-decoration-none text-reset">
                            <div class="position-relative image-wrapper">
                                @if($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->title }}"
                                        loading="lazy">
                                @else
                                    <div class="placeholder-art">
                                        <div class="placeholder-content">
                                            <i class="bi bi-book text-muted"></i>
                                            <span class="mt-2">No Cover</span>
                                        </div>
                                    </div>
                                @endif
                                <span class="category-badge">
                                    {{ $book->category->name }}
                                </span>
                            </div>

                            <div class="card-body p-4">
                                <h3 class="card-title fw-bold mb-3 clamp-2">{{ $book->title }}</h3>
                                <div class="author-box mb-3">
                                    <i class="bi bi-pen"></i>
                                    <span class="ms-2">{{ $book->author }}</span>
                                </div>
                                <div class="meta-box d-flex justify-content-between">
                                    <div class="rating">
                                        ⭐⭐⭐⭐☆
                                    </div>
                                    <div class="date">
                                        <i class="bi bi-clock-history"></i>
                                        {{ $book->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 pagination-custom">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection