@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('content')
    <div class="py-12 bg-pink-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3 mt-1 mb-5">
            <div class="bg-gradient-to-br from-pink-200 via-pink-100 to-purple-100 p-8 rounded-2xl shadow-lg">

                <!-- Header Welcome -->
                <div class="space-y-3 mb-10">
                    <h1 class="text-3xl font-bold text-purple-700 tracking-tight text-center">
                        Selamat Datang, {{ Auth::user()->name }}! ✨
                    </h1>
                    @if(Auth::user()->last_login_at)
                        <div class="flex items-center text-pink-500 justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Terakhir login: {{ Auth::user()->last_login_at->diffForHumans() }}</span>
                        </div>
                    @endif
                </div>

                <!-- Stat Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <!-- Total Barang Tersedia -->
                    <div
                        class="bg-white border border-pink-300 rounded-xl p-6 shadow-md hover:shadow-lg transition duration-300">
                        <div class="flex items-center">
                            <div class="bg-pink-200 p-3 rounded-lg mr-4">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-purple-500">Total Barang Tersedia</p>
                                <p class="text-2xl font-bold text-purple-700">{{ $stats['total_items'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Kategori -->
                    <div
                        class="bg-white border border-pink-300 rounded-xl p-6 shadow-md hover:shadow-lg transition duration-300">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-purple-500">Jumlah Kategori</p>
                                <p class="text-2xl font-bold text-purple-700">{{ $stats['total_categories'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Barang Baru Ditambahkan (7 Hari Terakhir) -->
                    <div
                        class="bg-white border border-pink-300 rounded-xl p-6 shadow-md hover:shadow-lg transition duration-300">
                        <div class="flex items-center">
                            <div class="bg-pink-100 p-3 rounded-lg mr-4">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-purple-500">Barang Baru (7 Hari)</p>
                                <p class="text-2xl font-bold text-purple-700">{{ $stats['new_items'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white border border-pink-300 rounded-2xl p-6 mb-10 shadow-md">
                    <h2 class="text-xl font-semibold text-purple-700 mb-4">Akses Cepat</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('items.index') }}"
                            class="group p-4 bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl shadow-md hover:shadow-lg transition duration-300 flex items-center border border-pink-200 hover:bg-purple-100">
                            <div class="bg-pink-200 p-2 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </div>
                            <span class="text-purple-600 group-hover:text-purple-800 font-medium">Lihat Daftar Barang</span>
                        </a>

                        <a href="{{ route('activity') }}"
                            class="group p-4 bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl shadow-md hover:shadow-lg transition duration-300 flex items-center border border-pink-200 hover:bg-purple-100">
                            <div class="bg-pink-200 p-2 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-purple-600 group-hover:text-purple-800 font-medium">Riwayat</span>
                        </a>
                    </div>
                </div>

                <!-- Recent Items -->
                <div class="bg-white border border-pink-300 rounded-2xl p-6 shadow-md">
                    <h2 class="text-xl font-semibold text-purple-700 mb-4">Barang Terbaru</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($recent_items as $item)
                            <div
                                class="bg-gradient-to-br from-white to-pink-50 border border-pink-200 rounded-xl p-6 shadow-md hover:shadow-lg transition duration-300">
                                <h3 class="text-xl font-semibold text-purple-800 mb-2">{{ $item->name }}</h3>
                                <div class="text-purple-600 mb-1">
                                    <span class="font-semibold text-purple-700">Kategori:</span> {{ $item->category->name }}
                                </div>
                                <div class="text-purple-600 mb-4">
                                    <span class="font-semibold text-purple-700">Stok Tersedia:</span> {{ $item->quantity }}
                                </div>
                                <a href="{{ route('items.show', $item->id) }}"
                                    class="text-pink-500 font-medium hover:text-pink-600 hover:underline transition duration-300">
                                    Lihat Detail →
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection