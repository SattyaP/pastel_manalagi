@extends('admin.layouts.app')

@section('title', 'Produks')

@section('breadcrumb')
    <li><span class="mx-2">/</span></li>
    <li>Produks</li>
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('produks.create') }}"
            class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Produk
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow rounded-lg overflow-hidden text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Foto</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">
                            <img src="{{ $produk->foto_produk }}" alt="Foto" class="w-24 h-24 object-cover rounded shadow" />
                        </td>
                        <td class="p-3 font-medium">{{ $produk->nama_produk }}</td>
                        <td class="p-3">Rp {{ number_format($produk->harga, 2, ',', '.') }}</td>
                        <td class="p-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('produks.edit', $produk->id) }}"
                                    class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition"
                                    title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm0 0V21h8" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('produks.destroy', $produk->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-2 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition"
                                        title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Hapus
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
        {{ $produks->links() }}
    </div>
@endsection