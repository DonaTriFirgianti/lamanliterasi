@extends('layouts.app')

@section('content')
    <div class="container py-5 api-docs">
        <h1 class="display-4 mb-4 text-primary">📚 LamanLiterasi API Documentation v1.0</h1>

        <!-- Base URL Section -->
        <div class="alert alert-dark mb-5">
            <h4 class="alert-heading">Base URL</h4>
            <code class="h5">{{ url('/api') }}</code>
            <hr>
            <p class="mb-0">Semua endpoint membutuhkan header berikut kecuali login/register/logout:</p>
            <code>Authorization: Bearer &#123;token&#125;</code>
        </div>

        <!-- Authentication Section -->
        <section class="mb-5">
            <h2 class="mb-4 border-bottom pb-2">🔐 Authentication</h2>

            <!-- Register -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-success">POST</span> Register
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/auth/register</code>
                        </div>
                        <div class="col-md-8">
                            <h5>Request Example</h5>
                            <pre><code class="json">
    {
        "name": "Admin",
        "email": "admin@example.com",
        "password": "password123",
        "role": "admin"
    }</code></pre>

                            <h5>Success Response</h5>
                            <pre><code class="json">
    {
        "user": {
            "name": "Admin",
            "email": "admin@example.com",
            "password": "$2y$jhfrjSajxsJrfkjvdstgfufmbvutdlUJfg",
            "api_key": "wcZx3fjydiyguyifjgdtdkfutogcuy6vy2ghgkg",
            "id": "1"
        }
    }</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-success">POST</span> Login
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/auth/login</code>
                        </div>
                        <div class="col-md-8">
                            <h5>Request Example</h5>
                            <pre><code class="json">
    {
        "email": "admin@example.com",
        "password": "password123"
    }</code></pre>

                            <h5>Success Response</h5>
                            <pre><code class="json">
    {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
        "token_type": "bearer",
        "expired_in": 3600
    }
    </code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logout -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-danger">POST</span> Logout
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/auth/logout</code>
                            <div class="mt-3">
                                <h6>Headers</h6>
                                <code>Authorization: Bearer &#123;token&#125;</code>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5>Example Request</h5>
                            <pre><code class="bash">
            curl -X POST {{ url('/api/auth/logout') }} \ 
            -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
                                    </code></pre>

                            <h5>Success Response</h5>
                            <pre><code class="json">
            {
                "status": "success",
                "message": "Successfully logged out"
            }</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Books Section -->
        <section class="mb-5">
            <h2 class="mb-4 border-bottom pb-2">📚 Book Management</h2>

            <!-- Get All Books -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-primary">GET</span> Get All Books
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/books</code>
                            <div class="mt-3">
                                <h6>Headers</h6>
                                <code>Authorization: Bearer &#123;token&#125;</code>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5>Success Response</h5>
                            <pre><code class="json">
    {
        "status": "success",
        "data": {
            "current_page": 1,
            "data": [
            {
                "id": 1,
                "title": "Laskar Pelangi",
                "author": "Andrea Hirata",
                "description": "Laskar Pelangi adalah novel pertama dari tetralogi...",
                "category_id": 1,
                "user_id": 1,
                "is_published": 1,
                "published_at": "2025-05-11 13:55:59",
                "cover": "book-covers/gKdfMRsIHWfpQ5ZtkfZVW2qgBfzWFugYfrZgMJ6B.jpg",
                "created_at": "2025-05-11T13:55:59.000000Z",
                "updated_at": "2025-05-12T01:01:38.000000Z",
                "category": {
                "id": 1,
                "name": "Fiksi",
                "created_at": "2025-05-11T13:55:59.000000Z",
                "updated_at": "2025-05-11T13:55:59.000000Z"}
            }
        ],
            "total": 12
        }
    }</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Get Books by Category -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-primary">GET</span> Get Books by Category
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/books/category/{category_id}</code>
                            <div class="mt-3">
                                <h6>Headers</h6>
                                <code>Authorization: Bearer &#123;token&#125;</code>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5>Example Request</h5>
                            <code>GET {{ url('/api/books/category/1') }}</code>

                            <h5 class="mt-3">Success Response</h5>
                            <pre><code class="json">
    {
        "status": "success",
        "data": {
            "current_page": 1,
            "data": [
            {
                "id": 1,
                "title": "Laskar Pelangi",
                "author": "Andrea Hirata",
                "description": "Laskar Pelangi adalah novel pertama dari tetralogi...",
                "category_id": 1,
                "user_id": 1,
                "is_published": 1,
                "published_at": "2025-05-11 13:55:59",
                "cover": "book-covers/gKdfMRsIHWfpQ5ZtkfZVW2qgBfzWFugYfrZgMJ6B.jpg",
                "created_at": "2025-05-11T13:55:59.000000Z",
                "updated_at": "2025-05-12T01:01:38.000000Z",
                "category": {
                "id": 1,
                "name": "Fiksi",
                "created_at": "2025-05-11T13:55:59.000000Z",
                "updated_at": "2025-05-11T13:55:59.000000Z"}
            }
        ],
            "total": 5
        }
    }</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Create Book -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-success">POST</span> Create Book
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/books</code>
                            <div class="mt-3">
                                <h6>Headers</h6>
                                <code>
                                    Content-Type: multipart/form-data<br>
                                    Authorization: Bearer &#123;token&#125;
                                </code>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5>Request Body</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Type</th>
                                        <th>Required</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>title</code></td>
                                        <td>string</td>
                                        <td>✅</td>
                                    </tr>
                                    <tr>
                                        <td><code>author</code></td>
                                        <td>string</td>
                                        <td>✅</td>
                                    </tr>
                                    <tr>
                                        <td><code>category_id</code></td>
                                        <td>integer</td>
                                        <td>✅</td>
                                    </tr>
                                    <tr>
                                        <td><code>description</code></td>
                                        <td>string</td>
                                        <td>✅</td>
                                    </tr>
                                    <tr>
                                        <td><code>cover</code></td>
                                        <td>file (max 2MB)</td>
                                        <td>❌</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5>Success Response (201 Created)</h5>
                            <pre><code class="json">{
        "status": "success",
        "data": {
            "id": 2,
            "title": "Judul Baru",
            "cover_url": "{{ url('/storage/book-covers/new-book.jpg') }}"
        }
    }</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Book -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-warning">PUT</span> Update Book
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/books/{id}</code>
                            <div class="mt-3">
                                <h6>Headers</h6>
                                <code>Authorization: Bearer &#123;token&#125;</code>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5>Request Example</h5>
                            <pre><code class="json">{
        "title": "Judul Updated",
        "author": "Penulis Updated"
    }</code></pre>

                            <h5>Success Response</h5>
                            <pre><code class="json">{
        "status": "success",
        "data": {
            "id": 1,
            "title": "Judul Updated",
            "author": "Penulis Updated"
        }
    }</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Book -->
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <span class="badge bg-danger">DELETE</span> Delete Book
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Endpoint</h5>
                            <code>/books/{id}</code>
                            <div class="mt-3">
                                <h6>Headers</h6>
                                <code>Authorization: Bearer &#123;token&#125;</code>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5>Success Response</h5>
                            <pre><code class="json">{
        "status": "success",
        "message": "Book deleted successfully"
    }</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Error Handling -->
        <section class="mb-5">
            <h2 class="mb-4 border-bottom pb-2">🚨 Error Responses</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Contoh Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>400</td>
                            <td>Bad Request</td>
                            <td>
                                <pre class="mb-0"><code class="json">{
        "status": "error",
        "message": "Invalid input data"
    }</code></pre>
                            </td>
                        </tr>
                        <tr>
                            <td>401</td>
                            <td>Unauthorized</td>
                            <td>
                                <pre class="mb-0"><code class="json">{
        "status": "error",
        "message": "Unauthenticated"
    }</code></pre>
                            </td>
                        </tr>
                        <tr>
                            <td>404</td>
                            <td>Not Found</td>
                            <td>
                                <pre class="mb-0"><code class="json">{
        "status": "error",
        "message": "Book not found"
    }</code></pre>
                            </td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>Server Error</td>
                            <td>
                                <pre class="mb-0"><code class="json">{
        "status": "error",
        "message": "Internal server error"
    }</code></pre>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <style>
        .api-docs pre {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 0.5rem;
            border: 1px solid #dee2e6;
        }

        .badge {
            font-size: 0.8em;
            padding: 0.5em 0.75em;
            min-width: 70px;
        }

        .badge.bg-success {
            background-color: #198754 !important;
        }

        .badge.bg-primary {
            background-color: #0d6efd !important;
        }

        .badge.bg-warning {
            background-color: #ffc107 !important;
            color: #000;
        }

        .badge.bg-danger {
            background-color: #dc3545 !important;
        }
    </style>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
@endsection