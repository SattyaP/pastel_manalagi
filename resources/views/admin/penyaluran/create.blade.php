@extends('admin.layouts.app')

@section('title', 'Tambah Penyaluran')
@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Penyaluran</li>
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
            <form action="{{ route('penyaluran.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="mitra_id" class="block text-sm font-medium text-gray-700">Mitra</label>
                    <select name="mitra_id" id="mitra_id"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Pilih Mitra</option>
                        @foreach ($mitras as $mitra)
                            <option value="{{ $mitra->id }}">{{ $mitra->nama_mitra }}</option>
                        @endforeach
                    </select>
                    @error('mitra_id')
                        <p class="text-red-500 text-xs mt-1">Mitra wajib dipilih</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="penawaran_id" class="block text-sm font-medium text-gray-700">Penawaran Sisa Makanan</label>
                    <select name="penawaran_id" id="penawaran_id"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Pilih Penawaran</option>
                        @foreach ($penawarans as $penawaran)
                            <option value="{{ $penawaran->id }}">{{ $penawaran->produk->nama_produk }} -
                                {{ $penawaran->kuantitas }} {{ $penawaran->satuan }}
                            </option>
                        @endforeach
                    </select>
                    @error('penawaran_id')
                        <p class="text-red-500 text-xs mt-1">Penawaran wajib dipilih</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tanggal_penyaluran" class="block text-sm font-medium text-gray-700">Tanggal
                        Penyaluran</label>
                    <input type="date" name="tanggal_penyaluran" id="tanggal_penyaluran"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('tanggal_penyaluran')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="status_pengiriman" class="block text-sm font-medium text-gray-700">Status Pengiriman</label>
                    <select name="status_pengiriman" id="status_pengiriman"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="Proses">Proses</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                    </select>
                    @error('status_pengiriman')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                    <input type="text" name="catatan" id="catatan"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('catatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection