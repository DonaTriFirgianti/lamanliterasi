@extends('admin.layouts.app')

@section('title', 'Edit Supplier')

@section('content')
    <div class="bg-pink-50 rounded-2xl shadow-lg p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-purple-700 mb-8">Edit Supplier - {{ $supplier->name }}</h2>

        <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Nama Supplier</label>
                    <input type="text" name="name" required
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm"
                        value="{{ old('name', $supplier->name) }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Email</label>
                    <input type="email" name="email" required
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm"
                        value="{{ old('email', $supplier->email) }}">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Telepon</label>
                    <input type="tel" name="phone" required
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm"
                        value="{{ old('phone', $supplier->phone) }}">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-purple-600">Alamat</label>
                    <textarea name="address" rows="3" required
                        class="w-full rounded-lg border border-pink-300 focus:border-purple-400 focus:ring-purple-300 bg-white shadow-sm">{{ old('address', $supplier->address) }}</textarea>
                    @error('address')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2 mt-4 flex items-center">
                    <button type="submit"
                        class="bg-purple-500 text-white px-6 py-2 rounded-xl hover:bg-purple-600 transition-all duration-200">
                        Update Supplier
                    </button>
                    <a href="{{ route('admin.suppliers.index') }}"
                        class="ml-3 bg-pink-200 text-purple-800 px-5 py-2 rounded-xl hover:bg-pink-300 transition-all duration-200">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection