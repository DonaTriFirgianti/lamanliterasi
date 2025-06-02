@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <div class="py-10 bg-pink-50 min-h-screen">
        <div class="max-w-6x2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-pink-200 via-pink-100 to-purple-100 p-8 rounded-2xl shadow-lg">

                <!-- Header Judul + Tombol Kembali -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10 gap-4">
                    <h1 class="text-4xl font-extrabold text-center md:text-left text-purple-700">
                        {{ $item->name }}
                    </h1>
                    <a href="{{ route('items.index') }}"
                        class="bg-purple-600 text-white px-5 py-2.5 rounded-xl shadow-md hover:bg-purple-700 transition duration-300 w-full md:w-auto text-center font-semibold">
                        ← Kembali ke Daftar
                    </a>
                </div>

                <!-- Grid Detail -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Kolom Kiri -->
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-sm font-bold text-pink-600 uppercase tracking-wide">Kategori</h2>
                            <p class="text-lg text-purple-800">{{ $item->category->name }}</p>
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-pink-600 uppercase tracking-wide">Supplier</h2>
                            <p class="text-lg text-purple-800">{{ $item->supplier->name }}</p>
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-pink-600 uppercase tracking-wide">Stok Tersedia</h2>
                            <p class="text-3xl font-extrabold text-purple-900">{{ $item->quantity }}</p>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-sm font-bold text-pink-600 uppercase tracking-wide">Deskripsi</h2>
                            <p class="text-base text-purple-800 whitespace-pre-line">{{ $item->description }}</p>
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-pink-600 uppercase tracking-wide">Tanggal Dibuat</h2>
                            <p class="text-base text-purple-800">{{ $item->created_at->translatedFormat('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
