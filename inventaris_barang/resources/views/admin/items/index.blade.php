@extends('admin.layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <div class="bg-gradient-to-r from-pink-100 via-pink-200 to-pink-300 rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-purple-700">Daftar Barang</h2>
            <a href="{{ route('admin.items.create') }}"
                class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg shadow">
                + Tambah Barang
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-pink-200 text-purple-700 font-semibold">
                    <tr>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">Kategori</th>
                        <th class="py-3 px-4 text-left">Supplier</th>
                        <th class="py-3 px-4 text-left">Stok</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-purple-800">
                    @foreach ($items as $item)
                        <tr class="border-t border-pink-200 hover:bg-pink-100 transition">
                            <td class="py-2 px-4">{{ $item->name }}</td>
                            <td class="py-2 px-4">{{ $item->category->name }}</td>
                            <td class="py-2 px-4">{{ $item->supplier->name }}</td>
                            <td class="py-2 px-4">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 flex gap-3 items-center">
                                <a href="{{ route('admin.items.show', $item->id) }}" class="text-blue-500 hover:text-blue-700"
                                    title="Lihat">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="{{ route('admin.items.edit', $item->id) }}"
                                    class="text-purple-600 hover:text-purple-800" title="Edit">
                                    <i data-feather="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Feather icons init --}}
    @push('scripts')
        <script>
            feather.replace()
        </script>
    @endpush
@endsection