@extends('admin.layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
    <div class="bg-pink-50 rounded-2xl shadow-lg p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-purple-700 mb-6">Detail Transaksi #{{ $transaction->id }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-purple-800">
            <div>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-purple-600">Tanggal Transaksi</dt>
                        <dd class="mt-1">{{ $transaction->created_at->format('d F Y H:i') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-purple-600">Barang</dt>
                        <dd class="mt-1">{{ $transaction->item->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-purple-600">Jumlah</dt>
                        <dd class="mt-1">{{ $transaction->quantity }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-purple-600">Jenis Transaksi</dt>
                        <dd class="mt-1">
                            <span
                                class="px-2 py-1 text-sm rounded-full {{ $transaction->type == 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $transaction->type == 'in' ? 'Masuk' : 'Keluar' }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>

            <div>
                <div class="bg-pink-100 rounded-xl p-4 text-purple-800">
                    <h3 class="text-lg font-semibold mb-4">Catatan Transaksi</h3>
                    <p>{{ $transaction->notes ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('admin.transactions.index') }}"
                class="bg-pink-200 text-purple-800 font-medium px-5 py-2 rounded-lg shadow rounded-xl hover:bg-pink-300 transition-all duration-200">
                Kembali ke Daftar
            </a>
        </div>
    </div>
@endsection