@extends('admin.layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')
    <div class="bg-gradient-to-r from-pink-100 via-pink-200 to-pink-300 rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-purple-700">Daftar Kategori</h2>
            <a href="{{ route('admin.categories.create') }}"
                class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg shadow">
                + Tambah Kategori
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-pink-200 text-purple-700 font-semibold">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm">Nama</th>
                        <th class="px-4 py-3 text-left text-sm">Deskripsi
                        </th>
                        <th class="px-4 py-3 text-left text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-pink-50 divide-y divide-pink-300 text-purple-800">
                    @foreach ($categories as $category)
                        <tr class="border-t border-pink-200 hover:bg-pink-100 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                {{ Str::limit($category->description, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex space-x-3 items-center">
                                    {{-- Tombol Lihat --}}
                                    <a href="{{ route('admin.categories.show', $category->id) }}"
                                        class="text-blue-500 hover:text-blue-700" title="Lihat">
                                        <i data-feather="eye" class="w-4 h-4"></i>
                                    </a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="text-purple-600 hover:text-purple-800" title="Edit">
                                        <i data-feather="edit-3" class="w-4 h-4"></i>
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"
                                            class="text-red-500 hover:text-red-700 transition-colors duration-200"
                                            title="Hapus">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>

    {{-- Feather Icons --}}
    @push('scripts')
        <script>
            feather.replace()
        </script>
    @endpush
@endsection