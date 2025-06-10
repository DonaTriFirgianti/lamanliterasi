@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card rainbow-hover-effect rounded-4">
                <div class="card-header bg-gradient-purple text-white py-4 position-relative overflow-hidden">
                    <div class="header-content">
                        <h2 class="mb-0 fw-bold"><i class="bi bi-stars me-2"></i>Tambah Buku Baru</h2>
                        <p class="mb-0 text-light opacity-75">Isi form berikut untuk menambah koleksi baru</p>
                    </div>
                    <div class="decorative-circle" style="background: var(--rainbow-gradient); opacity: 0.2;"></div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" id="bookForm">
                        @csrf
                        <div class="form-grid row g-4">
                            <!-- Left Column -->
                            <div class="form-column col-lg-6">
                                <div class="floating-input mb-4">
                                    <input type="text" id="title" name="title" class="form-control rounded-3" required>
                                    <label for="title"><i class="bi bi-bookmark-star me-1"></i> Judul Buku</label>
                                    <div class="input-decoration bg-gradient-purple"></div>
                                </div>

                                <div class="floating-input mb-4">
                                    <input type="text" id="author" name="author" class="form-control rounded-3" required>
                                    <label for="author"><i class="bi bi-person-workspace me-1"></i> Penulis</label>
                                    <div class="input-decoration bg-gradient-purple"></div>
                                </div>

                                <div class="floating-select mb-4">
                                    <select id="category_id" name="category_id" class="form-select rounded-3" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label><i class="bi bi-tags me-1"></i> Kategori</label>
                                    <div class="select-arrow bg-gradient-purple"></div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="form-column col-lg-6">
                                <div class="floating-textarea mb-4">
                                    <textarea id="description" name="description" class="form-control rounded-3" rows="5" required></textarea>
                                    <label for="description"><i class="bi bi-card-text me-1"></i> Deskripsi Buku</label>
                                    <div class="textarea-decoration bg-gradient-purple"></div>
                                </div>

                                <div class="file-upload-card p-4 rounded-3 bg-soft-purple">
                                    <div class="upload-header d-flex align-items-center gap-2 mb-3">
                                        <i class="bi bi-image text-purple"></i>
                                        <h6 class="mb-0 fw-bold">Upload Cover Buku</h6>
                                    </div>
                                    <input type="file" id="cover" name="cover" accept="image/*" class="form-control rounded-3">
                                    <div class="upload-preview mt-3" id="previewContainer"></div>
                                    <small class="upload-hint text-muted mt-2 d-block">Seret file atau klik untuk mengupload (maks 5MB)</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions d-flex gap-3 justify-content-end mt-4">
                            <button type="button" class="btn btn-soft-danger rounded-pill px-4" onclick="window.history.back()">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </button>
                            <button type="submit" class="btn btn-glow-pink rounded-pill px-4 position-relative">
                                <i class="bi bi-save me-1"></i> Simpan Buku
                                <div class="submit-loader d-none"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <style>
            :root {
                --purple-gradient: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
                --rainbow-gradient: linear-gradient(90deg, #ec4899 0%, #f472b6 25%, #818cf8 50%, #60a5fa 75%, #34d399 100%);
            }

            .bg-gradient-purple {
                background: var(--purple-gradient);
                border-radius: 12px 12px 0 0;
            }

            .bg-soft-purple {
                background-color: rgba(139, 92, 246, 0.08);
                border-radius: 12px;
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

            .btn-soft-danger {
                background-color: rgba(239, 68, 68, 0.1);
                color: #ef4444;
                transition: all 0.3s ease;
            }

            .btn-soft-danger:hover {
                background-color: rgba(239, 68, 68, 0.2);
                transform: translateY(-2px);
            }

            .floating-input,
            .floating-select,
            .floating-textarea {
                position: relative;
                margin-bottom: 1.5rem;
            }

            .floating-input input,
            .floating-select select,
            .floating-textarea textarea {
                width: 100%;
                padding: 12px 16px;
                border: 1px solid rgba(139, 92, 246, 0.2);
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.9);
                transition: all 0.3s ease;
            }

            .floating-input input:focus,
            .floating-select select:focus,
            .floating-textarea textarea:focus {
                border-color: #8b5cf6;
                box-shadow: 0 0 10px rgba(139, 92, 246, 0.2);
                outline: none;
            }

            .floating-input label,
            .floating-select label,
            .floating-textarea label {
                position: absolute;
                top: 50%;
                left: 16px;
                transform: translateY(-50%);
                color: #6b7280;
                pointer-events: none;
                transition: all 0.3s ease;
                font-size: 0.95rem;
            }

            .floating-input input:focus + label,
            .floating-input input:not(:placeholder-shown) + label,
            .floating-select select:focus + label,
            .floating-select select:not(:placeholder-shown) + label,
            .floating-textarea textarea:focus + label,
            .floating-textarea textarea:not(:placeholder-shown) + label {
                top: -10px;
                left: 12px;
                font-size: 0.75rem;
                color: #8b5cf6;
                background: white;
                padding: 0 4px;
            }

            .input-decoration,
            .select-arrow,
            .textarea-decoration {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 0;
                height: 2px;
                background: var(--purple-gradient);
                transition: width 0.3s ease;
            }

            .floating-input input:focus ~ .input-decoration,
            .floating-select select:focus ~ .select-arrow,
            .floating-textarea textarea:focus ~ .textarea-decoration {
                width: 100%;
            }

            .file-upload-card {
                border: 1px solid rgba(139, 92, 246, 0.2);
                transition: all 0.3s ease;
            }

            .file-upload-card:hover {
                box-shadow: 0 5px 15px rgba(139, 92, 246, 0.1);
            }

            .upload-preview img {
                max-width: 100%;
                max-height: 150px;
                border-radius: 8px;
                margin-top: 10px;
            }

            .sweet-alert-popup {
                border-radius: 16px;
                box-shadow: 0 10px 30px rgba(139, 92, 246, 0.1);
            }

            .sweet-confirm-btn {
                background: var(--purple-gradient) !important;
                border: none !important;
                border-radius: 10px !important;
                padding: 10px 20px !important;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Image Preview
                const coverInput = document.getElementById('cover');
                const previewContainer = document.getElementById('previewContainer');

                coverInput.addEventListener('change', function (e) {
                    previewContainer.innerHTML = '';
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Error Handling
                @if($errors->any())
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Gagal',
                        html: `<div class="sweet-alert-content">
                            <ul class="sweet-alert-list text-start ps-4">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>`,
                        confirmButtonColor: '#8b5cf6',
                        confirmButtonText: 'Mengerti',
                        background: '#ffffff',
                        customClass: {
                            popup: 'sweet-alert-popup',
                            confirmButton: 'sweet-confirm-btn'
                        }
                    });
                @endif
            });
        </script>
@endsection