@extends('admin.layouts.app')
@section('title', 'Detail Penawaran')
@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Detail Penawaran</li>
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

        <div class="bg-white shadow-lg rounded-xl p-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">Informasi Penawaran</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="mb-2"><span class="font-semibold text-gray-700">ID Penawaran:</span> {{ $penawarans->id }}
                    </p>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Nama Produk:</span>
                        {{ $penawarans->produk->nama_produk }}</p>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Kuantitas:</span>
                        {{ $penawarans->kuantitas }} {{ $penawarans->satuan }}</p>
                </div>
                <div>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Tanggal Penawaran:</span>
                        {{ $penawarans->tanggal_penawaran->format('d-m-Y') }}</p>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Waktu Kadaluarsa:</span>
                        {{ $penawarans->waktu_kadaluarsa->format('d-m-Y H:i') }}</p>
                    <p class="mb-2 flex items-center">
                        <span class="font-semibold text-gray-700 mr-2">Status:</span>
                        @php
                            $status = strtolower($penawarans->status);
                            $badgeClasses = [
                                'aktif' => 'bg-green-100 text-green-800 border-green-400',
                                'tidak aktif' => 'bg-red-100 text-red-800 border-red-400',
                                'default' => 'bg-gray-100 text-gray-800 border-gray-400',
                            ];
                            $class = $badgeClasses[$status] ?? $badgeClasses['default'];
                        @endphp
                        <span class="inline-block px-3 py-1 rounded-full border text-sm font-semibold {{ $class }}">
                            {{ ucfirst($penawarans->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('penyaluran.penawaran') }}"
            class="inline-block mt-6 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Kembali ke Daftar Penawaran
        </a>
    </div>
@endsection