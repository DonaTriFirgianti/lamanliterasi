<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LamanLiterasi | Portal Buku Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary: #2A5C82;
            --secondary: #8ECAE6;
            --accent: #FFB703;
            --glass: rgba(255, 255, 255, 0.9);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #f8f9fa, #e9ecef);
            min-height: 100vh;
        }

        main.container {
            padding-top: 80px !important;
        }

        .navbar {
            padding: 0.8rem 1rem; 
            height: 70px; 
            backdrop-filter: blur(10px);
            background: var(--glass) !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.25rem;
        }

        .glass-card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .effect-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .image-wrapper {
            aspect-ratio: 3/4;
            overflow: hidden;
        }

        .card-img-top {
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .placeholder-art {
            height: 100%;
            background: linear-gradient(45deg, #f1f3f5 0%, #e9ecef 100%);
            display: grid;
            place-items: center;
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: white;
        }

        .clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .author-box {
            display: flex;
            align-items: center;
            color: var(--primary);
            font-weight: 500;
        }

        .meta-box {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .text-gradient-primary {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .pagination-custom .page-link {
            border-radius: 10px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        footer {
            padding: 0.8rem 1rem !important;
            height: 70px;
            backdrop-filter: blur(10px);
            background: var(--glass) !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer p {
            text-align: center;
            margin: 0;
            font-size: 0.9rem;
            color: rgba(0, 0, 0, 0.7) !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-book me-2"></i>LamanLiterasi
            </a>
            <div class="navbar-nav flex-row gap-3">
                <a class="nav-link {{ request()->routeIs('api.docs') ? 'active' : '' }}" href="{{ route('api.docs') }}"> 
                    API Documentation
                </a>

                @if(request()->is('admin*') && !request()->routeIs('admin.books.show'))
                    @auth
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <main class="container mt-5 pt-5">
        @yield('content')
    </main>

    <footer class="mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2025 LamanLiterasi. All rights reserved</p>
        </div>
    </footer>
    <script>
        window.addEventListener('show-toast', event => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: event.detail.type,
                title: event.detail.message
            })
        })

        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ Session::get('success') }}',
                timer: 3000
            })
        @endif

        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ Session::get('error') }}',
                timer: 3000
            })
        @endif
    </script>
</body>

</html>