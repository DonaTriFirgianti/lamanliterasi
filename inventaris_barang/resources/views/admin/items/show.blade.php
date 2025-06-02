@extends('admin.layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <div class="bg-pink-50 rounded-2xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-purple-700 mb-6">Detail Barang</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-purple-800">
            <div>
                <p><span class="font-semibold">Nama:</span> {{ $item->name }}</p>
                <p><span class="font-semibold">Kategori:</span> {{ $item->category->name }}</p>
                <p><span class="font-semibold">Supplier:</span> {{ $item->supplier->name }}</p>
                <p><span class="font-semibold">Jumlah Stok:</span> {{ $item->quantity }}</p>
            </div>
            <div>
                <p><span class="font-semibold">Deskripsi:</span></p>
                <p class="mt-1 bg-white p-4 rounded-lg border border-pink-200 shadow-inner">{{ $item->description }}</p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.items.index') }}"
                class="bg-pink-200 hover:bg-pink-300 text-purple-800 font-medium px-5 py-2 rounded-lg shadow">
                Kembali ke Daftar
            </a>
        </div>
    </div>
@endsection