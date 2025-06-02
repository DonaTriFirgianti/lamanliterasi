@extends('admin.layouts.app')

@section('title', 'Tambah Barang Baru')

@section('content')
    <div class="bg-pink-50 rounded-2xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-purple-700 mb-6">Tambah Barang Baru</h2>

        <form action="{{ route('admin.items.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-purple-700">Nama Barang</label>
                    <input type="text" name="name" required
                        class="w-full rounded-lg border border-pink-200 focus:border-purple-400 focus:ring-purple-300 shadow-sm"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-purple-700">Kategori</label>
                    <select name="category_id" required
                        class="w-full rounded-lg border border-pink-200 focus:border-purple-400 focus:ring-purple-300 shadow-sm">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-purple-700">Supplier</label>
                    <select name="supplier_id" required
                        class="w-full rounded-lg border border-pink-200 focus:border-purple-400 focus:ring-purple-300 shadow-sm">
                        <option value="">Pilih Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-purple-700">Stok Awal</label>
                    <input type="number" name="quantity" min="0" required
                        class="w-full rounded-lg border border-pink-200 focus:border-purple-400 focus:ring-purple-300 shadow-sm"
                        value="{{ old('quantity') }}">
                    @error('quantity')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-purple-700">Deskripsi</label>
                    <textarea name="description" rows="4" required
                        class="w-full rounded-lg border border-pink-200 focus:border-purple-400 focus:ring-purple-300 shadow-sm">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2 flex justify-start items-center gap-3 mt-4">
                    <button type="submit"
                        class="bg-purple-500 hover:bg-purple-600 text-white font-medium px-6 py-2 rounded-lg shadow">
                        Simpan Barang
                    </button>
                    <a href="{{ route('admin.items.index') }}"
                        class="bg-pink-200 hover:bg-pink-300 text-purple-800 font-medium px-5 py-2 rounded-lg shadow">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection