@extends('admin.layouts.app')

@section('title', 'Manajemen Transaksi')

@section('content')
    <div class="bg-gradient-to-r from-pink-100 via-pink-200 to-pink-300 rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-purple-700">Daftar Transaksi</h2>
            <a href="{{ route('admin.transactions.create') }}"
                class="bg-purple-500 text-white px-5 py-2 rounded-xl hover:bg-purple-600 transition-all duration-200 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Transaksi
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
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Barang</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Jenis</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-purple-800">
                    @forelse ($transactions as $transaction)
                        <tr class="border-t border-pink-200 hover:bg-pink-100 transition">
                            <td class="px-4 py-3 whitespace-nowrap">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-3">{{ $transaction->item->name }}</td>
                            <td class="px-4 py-3">{{ $transaction->quantity }}</td>
                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 text-sm rounded-full {{ $transaction->type == 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $transaction->type == 'in' ? 'Masuk' : 'Keluar' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 space-x-2 flex items-center">
                                <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="text-blue-500 hover:text-blue-700"
                                    title="lihat">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                                    class="text-purple-600 hover:text-purple-800" title="Edit">
                                    <i data-feather="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')"
                                    class="inline">
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
                            <td colspan="5" class="px-4 py-6 text-center text-purple-500">Tidak ada data transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $transactions->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            feather.replace()
        </script>
    @endpush
@endsection