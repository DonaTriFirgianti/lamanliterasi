@extends('admin.layouts.app')

@section('title', 'Buat Transaksi Baru')

@section('content')
    <div class="bg-pink-50 rounded-2xl shadow-lg p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-purple-700 mb-8">Buat Transaksi Baru</h2>

        <form action="{{ route('admin.transactions.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Barang</label>
                    <select name="item_id" required
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm">
                        <option value="">Pilih Barang</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} (Stok: {{ $item->quantity }})</option>
                        @endforeach
                    </select>
                    @error('item_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Jumlah</label>
                    <input type="number" name="quantity" min="1" required
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm">
                    @error('quantity')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Jenis Transaksi</label>
                    <select name="type" required
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm">
                        <option value="in">Masuk (Penambahan Stok)</option>
                        <option value="out">Keluar (Pengurangan Stok)</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Catatan</label>
                    <textarea name="notes" rows="3"
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm"></textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2 mt-4 flex items-center">
                    <button type="submit"
                        class="bg-purple-500 text-white px-6 py-2 rounded-xl hover:bg-purple-600 transition-all duration-200">
                        Simpan Transaksi
                    </button>
                    <a href="{{ route('admin.transactions.index') }}"
                        class="ml-3 bg-pink-200 text-purple-800 px-5 py-2 rounded-xl hover:bg-pink-300 transition-all duration-200">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection