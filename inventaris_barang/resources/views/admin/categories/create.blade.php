@extends('admin.layouts.app')

@section('title', 'Tambah Kategori Baru')

@section('content')
    <div class="bg-pink-100 rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-6">Tambah Kategori Baru</h2>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" name="name" required
                        class="w-full rounded-md border-gray-300 focus:border-pink-500 focus:ring-pink-500"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full rounded-md border-gray-300 focus:border-pink-500 focus:ring-pink-500">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-pink-500 text-white px-6 py-2 rounded hover:bg-pink-600">
                        Simpan Kategori
                    </button>
                    <a href="{{ route('admin.categories.index') }}"
                        class="ml-2 bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection