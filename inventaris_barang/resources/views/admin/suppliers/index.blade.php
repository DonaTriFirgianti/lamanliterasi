@extends('admin.layouts.app')

@section('title', 'Daftar Supplier')

@section('content')
    <div class="bg-gradient-to-r from-pink-100 via-pink-200 to-pink-300 rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-purple-700">Daftar Supplier</h2>
            <a href="{{ route('admin.suppliers.create') }}"
                class="bg-purple-500 text-white px-5 py-2 rounded-xl hover:bg-purple-600 transition-all duration-200">
                + Tambah Supplier
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-xl mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-pink-200 text-purple-700 font-semibold">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Telepon</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-purple-800">
                    @forelse($suppliers as $index => $supplier)
                        <tr class="border-t border-pink-200 hover:bg-pink-100 transition">
                            <td class="px-4 py-3">{{ $supplier->name }}</td>
                            <td class="px-4 py-3">{{ $supplier->email }}</td>
                            <td class="px-4 py-3">{{ $supplier->phone }}</td>
                            <td class="px-4 py-3 space-x-2 flex items-center">
                                <a href="{{ route('admin.suppliers.show', $supplier->id) }}" class="text-blue-500 hover:text-blue-700"
                                    title="Lihat">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="text-purple-600 hover:text-purple-800"
                                    title="Edit">
                                    <i data-feather="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600" title="Hapus">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-purple-500">Tidak ada data supplier.</td>
                        </tr>
                    @endforelse
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