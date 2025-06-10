@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="auth-card shadow-lg rounded-4 overflow-hidden">
                    <div class="auth-header text-center p-5 bg-primary text-white">
                        <h2 class="display-6 fw-bold mb-3">
                            <i class="bi bi-book me-2"></i>LamanLiterasi
                        </h2>
                        <p class="mb-0">Masuk ke akun Anda</p>
                    </div>

                    <div class="auth-body p-5">
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf

                            <!-- Email Input -->
                            <div class="mb-4">
                                <label for="email" class="form-label text-muted">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope-fill text-primary"></i>
                                    </span>
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="email@example.com" required
                                        autocomplete="email" autofocus>
                                </div>
                            </div>

                            <!-- Password Input -->
                            <div class="mb-4">
                                <label for="password" class="form-label text-muted">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" required autocomplete="current-password">
                                </div>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label text-muted" for="remember">
                                        Ingat Saya
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">
                                        Lupa Password?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk SweetAlert --}}
    @error('email')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: '{{ $message }}',
                    confirmButtonColor: '#2a5c82',
                    background: '#f8f9fa',
                    color: '#212529',
                    customClass: {
                        popup: 'rounded-4',
                        title: 'h4'
                    }
                });
            });
        </script>
    @enderror

    @error('password')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: '{{ $message }}',
                    confirmButtonColor: '#2a5c82',
                    background: '#f8f9fa',
                    color: '#212529',
                    customClass: {
                        popup: 'rounded-4',
                        title: 'h4'
                    }
                });
            });
        </script>
    @enderror

    <style>
        .login-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 90vh;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .auth-header {
            background: linear-gradient(45deg, #2a5c82, #8ecae6);
            position: relative;
            overflow: hidden;
        }

        .auth-header::after {
            content: "";
            position: absolute;
            bottom: -20px;
            left: -20px;
            right: -20px;
            height: 40px;
            background: white;
            transform: rotate(-2deg);
        }

        .input-group-text {
            background-color: #f8f9fa;
            border: none;
            padding: 0.8rem 1.2rem;
        }

        .form-control-lg {
            padding: 0.8rem 1.2rem;
            border: 1px solid #dee2e6;
            border-left: none;
        }

        .btn-primary {
            background: linear-gradient(45deg, #2a5c82, #8ecae6);
            border: none;
            padding: 0.8rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(42, 92, 130, 0.3);
        }
    </style>
@endsection