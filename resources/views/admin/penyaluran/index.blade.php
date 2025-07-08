@extends('admin.layouts.app')

@section('title', 'Pengajuan Penyaluran')
@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Pengajuan Penyaluran</li>
@endsection

@section('content')
    <div class="mt-6">
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

        <p class="mb-4">Daftar pengajuan penyaluran makanan untuk mitra.</p>
        <div class="mb-4">
            <a href="{{ route('penyaluran.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                Tambah Penyaluran
            </a>
        </div>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-4 text-left">Nama Mitra</th>
                    <th class="px-6 py-4 text-left">Produk</th>
                    <th class="px-6 py-4 text-left">Kuantitas</th>
                    <th class="px-6 py-4 text-left">Tanggal Penyaluran</th>
                    <th class="px-6 py-4 text-left">Status Pengiriman</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyalurans as $penyaluran)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $penyaluran->mitra->nama_mitra }}</td>
                        <td class="px-6 py-4">{{ $penyaluran->penawaranSisaMakanan->produk->nama_produk }}</td>
                        <td class="px-6 py-4">{{ $penyaluran->penawaranSisaMakanan->kuantitas }}</td>
                        <td class="px-6 py-4">{{ $penyaluran->tanggal_penyaluran->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @php
                                $status = strtolower($penyaluran->status_pengiriman);
                                $color = match ($status) {
                                    'proses' => 'bg-blue-100 text-blue-800',
                                    'selesai' => 'bg-green-100 text-green-800',
                                    'dibatalkan' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800',
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full font-semibold {{ $color }}">
                                {{ ucfirst($penyaluran->status_pengiriman) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('penyaluran.show', $penyaluran->id) }}"
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Detail</a>

                            @if(!$penyaluran->status_pengiriman == 'selesai')
                                <a href="{{ route('penyaluran.upload_dokumentasi', $penyaluran->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Upload
                                    Dokumentasi</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $penyalurans->links() }}
        </div>
    </div>
@endsection