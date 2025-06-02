@extends('admin.layouts.app')

@section('title', 'Detail Kategori')

@section('content')
        <div class="bg-pink-50 rounded-2xl shadow-lg p-8 border border-pink-200">
            <h2 class="text-2xl font-bold text-purple-700 mb-6">Detail Kategori - {{ $category->name }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-purple-800">
                <div>
                    <h4 class="font-semibold text-purple-600">Nama Kategori:</h4>
                    <p>{{ $category->name }}</p>
                </div>
                <div>
                    <h4 class="font-semibold text-purple-600">Deskripsi:</h4>
                    <p>{{ $category->description }}</p>
                </div>
                <div>
                    <h4 class="font-semibold text-purple-600">Total Barang:</h4>
                    <p>{{ $category->items->count() }}</p>
                </div>
            </div>

        <div class="mt-8 flex items-center">
            <a href="{{ route('admin.categories.index') }}"
                class="bg-pink-200 text-purple-800 px-5 py-2 rounded-xl hover:bg-pink-300 transition-all duration-200 font-medium px-5 py-2 rounded-lg shadow">
                Kembali ke Daftar
            </a>
        </div>
    </div>
@endsection