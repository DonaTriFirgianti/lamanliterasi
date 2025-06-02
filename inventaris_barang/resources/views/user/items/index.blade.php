@extends('layouts.app')

@section('title', 'Daftar Barang Inventaris')

@section('content')
    <div class="py-12 bg-pink-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3 mt-1 mb-5">
            <div class="bg-gradient-to-br from-pink-200 via-pink-100 to-purple-100 p-8 rounded-2xl shadow-lg">

                <!-- Judul -->
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-3xl font-bold text-purple-700 text-center flex-1 -ml-12">
                        Daftar Barang Inventaris
                    </h1>
                </div>

                <!-- Form Pencarian -->
                <div class="mb-8">
                    <form action="{{ route('items.index') }}" method="GET"
                        class="flex flex-col sm:flex-row justify-center items-center gap-4">
                        <input type="text" name="search" placeholder="Cari barang atau kategori..."
                            class="w-full sm:w-2/3 rounded-lg border border-pink-300 focus:ring-2 focus:ring-purple-400 focus:outline-none px-4 py-2"
                            value="{{ request('search') }}">
                        <button type="submit"
                            class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-300">
                            Cari
                        </button>
                    </form>
                </div>

                <!-- Daftar Barang -->
                @if($items->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Tidak ada barang yang ditemukan</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($items as $item)
                            <div class="bg-white border border-pink-300 rounded-xl p-6 shadow-md hover:shadow-lg transition duration-300">
                                <h3 class="text-xl font-semibold text-purple-800 mb-2">{{ $item->name }}</h3>
                                <div class="text-purple-600 mb-1">
                                    <span class="font-semibold text-purple-700">Kategori:</span> {{ $item->category->name }}
                                </div>
                                <div class="text-purple-600 mb-4">
                                    <span class="font-semibold text-purple-700">Stok Tersedia:</span> {{ $item->quantity }}
                                </div>
                                <a href="{{ route('items.show', $item->id) }}" class="text-pink-500 font-medium hover:underline">
                                    Lihat Detail →
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Pagination -->
                <div class="mt-8 text-center">
                    {{ $items->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection