@extends('admin.layouts.app')

@section('title', 'Detail Supplier')

@section('content')
    <div class="bg-pink-50 rounded-2xl shadow-lg p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-purple-700 mb-6">Detail Supplier - {{ $supplier->name }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-purple-800">
            <div>
                <h4 class="font-semibold text-purple-600">Nama:</h4>
                <p>{{ $supplier->name }}</p>
            </div>
            <div>
                <h4 class="font-semibold text-purple-600">Email:</h4>
                <p>{{ $supplier->email }}</p>
            </div>
            <div>
                <h4 class="font-semibold text-purple-600">Telepon:</h4>
                <p>{{ $supplier->phone }}</p>
            </div>
            <div class="md:col-span-2">
                <h4 class="font-semibold text-purple-600">Alamat:</h4>
                <p>{{ $supplier->address }}</p>
            </div>
        </div>

        <div class="mt-8 flex items-center">
            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"
                class="bg-purple-500 text-white px-5 py-2 rounded-xl hover:bg-purple-600 transition-all duration-200">
                Edit
            </a>
            <a href="{{ route('admin.suppliers.index') }}"
                class="ml-3 bg-pink-200 text-purple-800 px-5 py-2 rounded-xl hover:bg-pink-300 transition-all duration-200">
                Kembali
            </a>
        </div>
    </div>
@endsection