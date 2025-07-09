@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('breadcrumb')
    <li><span class="mx-2">/</span></li>
    <li><a href="{{ route('produks.index') }}" class="text-blue-500 hover:underline">Produks</a></li>
    <li><span class="mx-2">/</span></li>
    <li>Edit</li>
@endsection

@section('content')
    <div class="bg-white p-6 rounded-xl shadow mx-auto">

        <form action="{{ route('produks.update', $produk->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium text-sm">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('nama_produk')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-sm">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-sm">Harga</label>
                <input type="number" step="0.01" name="harga" value="{{ old('harga', $produk->harga) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('harga')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-sm">Foto Produk (opsional)</label>
                @if($produk->foto_produk)
                    <img src="{{ $produk->foto_produk }}" alt="Foto" class="w-32 h-32 object-cover mb-2 rounded shadow">
                @endif
                <input type="file" name="foto_produk"
                    class="w-full text-sm file:border file:border-gray-300 file:rounded file:px-3 file:py-2 file:bg-gray-100">
                @error('foto_produk')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-right">
                <a href="{{ route('produks.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 px-5 py-2.25 text-white rounded">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection