@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-6 space-y-6 bg-pink-50 min-h-screen">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-purple-700">Selamat Datang, Admin!</h1>
                <p class="text-pink-500">Ringkasan Aktivitas Sistem</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Terakhir Update</p>
                <p class="font-medium text-purple-600">{{ now()->format('d M Y H:i') }}</p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Total Items Card -->
            <a href="{{ route('admin.items.index') }}"
                class="block transform transition-all hover:scale-105 duration-300 cursor-pointer">
                <div class="bg-gradient-to-br from-pink-400 to-pink-500 rounded-2xl p-5 shadow-md text-white h-full">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <p class="text-xl font-bold mb-1">Total Barang</p>
                            <p class="text-5xl">{{ $stats['total_items'] }}</p>
                        </div>
                        <div class="flex justify-between items-end">
                            <div class="w-12 h-1 bg-white/30 rounded-full">
                                <div class="h-1 bg-white w-3/4 rounded-full"></div>
                            </div>
                            <div class="bg-white/20 p-3 rounded-full">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Categories Card -->
            <a href="{{ route('admin.categories.index') }}"
                class="block transform transition-all hover:scale-105 duration-300 cursor-pointer">
                <div class="bg-gradient-to-br from-purple-400 to-purple-500 rounded-2xl p-5 shadow-md text-white h-full">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <p class="text-xl font-bold mb-1">Total Kategori</p>
                            <p class="text-5xl">{{ $stats['total_categories'] }}</p>
                        </div>
                        <div class="flex justify-between items-end">
                            <div class="w-12 h-1 bg-white/30 rounded-full">
                                <div class="h-1 bg-white w-2/3 rounded-full"></div>
                            </div>
                            <div class="bg-white/20 p-3 rounded-full">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Suppliers Card -->
            <a href="{{ route('admin.suppliers.index') }}"
                class="block transform transition-all hover:scale-105 duration-300 cursor-pointer">
                <div class="bg-gradient-to-br from-pink-300 to-pink-400 rounded-2xl p-5 shadow-md text-white h-full">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <p class="text-xl font-bold mb-1">Total Supplier</p>
                            <p class="text-5xl">{{ $stats['total_suppliers'] }}</p>
                        </div>
                        <div class="flex justify-between items-end">
                            <div class="w-12 h-1 bg-white/30 rounded-full">
                                <div class="h-1 bg-white w-1/2 rounded-full"></div>
                            </div>
                            <div class="bg-white/20 p-3 rounded-full">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Transactions Card -->
            <a href="{{ route('admin.transactions.index') }}"
                class="block transform transition-all hover:scale-105 duration-300 cursor-pointer">
                <div class="bg-gradient-to-br from-purple-300 to-purple-400 rounded-2xl p-5 shadow-md text-white h-full">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <p class="text-xl font-bold mb-1">Total Transaksi</p>
                            <p class="text-5xl">{{ $stats['total_transactions'] }}</p>
                        </div>
                        <div class="flex justify-between items-end">
                            <div class="w-12 h-1 bg-white/30 rounded-full">
                                <div class="h-1 bg-white w-4/5 rounded-full"></div>
                            </div>
                            <div class="bg-white/20 p-3 rounded-full">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Charts & Activity Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Transaction Chart -->
            <div class="bg-white border border-pink-300 rounded-2xl p-6 shadow-md">
                <h3 class="text-lg font-semibold text-purple-700 mb-4">Statistik Transaksi</h3>
                <div class="h-80">
                    <canvas id="transactionChart"></canvas>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white border border-pink-300 rounded-2xl p-6 shadow-md">
                <h3 class="text-lg font-semibold text-purple-700 mb-4">Aktivitas Terakhir</h3>

                <div
                    class="space-y-4 max-h-96 overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-pink-300 scrollbar-track-pink-100">
                    @foreach($recent_transactions as $transaction)
                        <div
                            class="flex items-start p-4 rounded-xl border border-pink-200 hover:shadow-lg transition duration-300">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-pink-200 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-purple-800">
                                        {{ $transaction->type == 'in' ? 'Barang Masuk' : 'Barang Keluar' }}
                                    </p>
                                    <span class="text-xs text-purple-500">{{ $transaction->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-purple-600 mt-1">
                                    {{ $transaction->item->name }} - Qty: {{ $transaction->quantity }}
                                </p>
                                <div class="mt-2 text-xs text-purple-500 flex items-center">
                                    <span class="inline-block w-2 h-2 rounded-full bg-purple-600 mr-2"></span>
                                    Oleh: {{ $transaction->user->name ?? 'System' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('transactionChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($transactionData['labels']),
                    datasets: [
                        {
                            label: 'Transaksi Masuk',
                            data: @json($transactionData['in']),
                            borderColor: '#A855F7',
                            tension: 0.4,
                            fill: false
                        },
                        {
                            label: 'Transaksi Keluar',
                            data: @json($transactionData['out']),
                            borderColor: '#EC4899',
                            tension: 0.4,
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' },
                        title: {
                            display: true,
                            text: 'Statistik Transaksi 6 Bulan Terakhir'
                        }
                    },
                    scales: { y: { beginAtZero: true } }
                }
            });
        </script>
    @endpush
@endsection