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

    <div class="mb-4">
        <a href="{{ route('produks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah
            Produk</a>
    </div>

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
                        <img src="{{ $produk->foto_produk }}" alt="Foto" class="w-16 h-16 object-cover rounded" />
                    </td>
                    <td class="p-3">{{ $produk->nama_produk }}</td>
                    <td class="p-3">Rp {{ number_format($produk->harga, 2, ',', '.') }}</td>
                    <td class="p-3 flex space-x-2">
                        <a href="{{ route('produks.edit', $produk->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('produks.destroy', $produk->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $produks->links() }}
    </div>
@endsection