@extends('admin.layouts.app')

@section('title', 'Buat Penawaran Penyaluran')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Buat Penawaran Penyaluran</li>
@endsection

@section('content')
    <div class="mt-4">
        @if (session('success'))
            <div class="mb-6">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error', 'Something went wrong!') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('penawaran.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="produk_id" class="block text-sm font-medium text-gray-700">Produk</label>
                    <select name="produk_id" id="produk_id"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Pilih Produk</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                        @endforeach
                    </select>
                    @error('produk_id')
                        <p class="text-red-500 text-xs mt-1">Product wajib dipilih</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="kuantitas" class="block text-sm font-medium text-gray-700">Kuantitas</label>
                    <input type="number" name="kuantitas" id="kuantitas"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('kuantitas')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan</label>
                    <select name="satuan" id="satuan"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Pilih Satuan</option>
                        <option value="pcs">Pcs</option>
                        <option value="box">Box</option>
                    </select>
                    @error('satuan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-3">
                    <div class="mb-4 w-full">
                        <label for="tanggal_penawaran" class="block text-sm font-medium text-gray-700">Tanggal
                            Penawaran</label>
                        <input type="date" name="tanggal_penawaran" id="tanggal_penawaran"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('tanggal_penawaran')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 w-full">
                        <label for="waktu_kadaluarsa" class="block text-sm font-medium text-gray-700">Waktu
                            Kadaluarsa</label>
                        <input type="datetime-local" name="waktu_kadaluarsa" id="waktu_kadaluarsa"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('waktu_kadaluarsa')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Sudah Dialokasikan">Sudah Dialokasikan</option>
                        <option value="Tersalurkan">Tersalurkan</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Buat
                    Penawaran</button>
            </form>
        </div>
    </div>
@endsection