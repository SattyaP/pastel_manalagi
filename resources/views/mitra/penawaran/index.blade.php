@extends('admin.layouts.app')
@section('title', 'Informasi Penawaran Sisa Makanan')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Informasi Penawaran Sisa Makanan</li>
@endsection

@section('content')
    <div class="mt-8">
        @if (session('success'))
            <div class="mb-6">
                <div class="bg-green-50 border-l-4 border-green-600 text-green-800 p-4 rounded shadow-sm flex items-center gap-3"
                    role="alert">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <p class="font-semibold">Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6">
                <div class="bg-red-50 border-l-4 border-red-600 text-red-800 p-4 rounded shadow-sm flex items-center gap-3"
                    role="alert">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <div>
                        <p class="font-semibold">Error</p>
                        <p>{{ session('error', 'Something went wrong!') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @foreach ($penawarans as $penawaran)
            <div class="mb-10">
                <div class="bg-white shadow-lg rounded-xl p-8 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex flex-col md:flex-row gap-8 items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ $penawaran->produk->foto_produk }}" alt="{{ $penawaran->produk->nama_produk }}"
                                class="w-40 h-40 object-cover rounded-lg border-2 border-gray-200 shadow-sm">
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ $penawaran->produk->nama_produk }}</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-gray-700">
                                <div>
                                    <p class="mb-1"><span class="font-semibold">Nama Produk:</span>
                                        {{ $penawaran->produk->nama_produk }}</p>
                                    <p class="mb-1"><span class="font-semibold">Kuantitas:</span> {{ $penawaran->kuantitas }}
                                        {{ $penawaran->satuan }}
                                    </p>
                                    <p class="mb-1"><span class="font-semibold">Tanggal Penawaran:</span>
                                        {{ \Carbon\Carbon::parse($penawaran->tanggal_penawaran)->format('d-m-Y') }}</p>
                                </div>
                                <div>
                                    <p class="mb-1"><span class="font-semibold">Waktu Kadaluarsa:</span>
                                        {{ $penawaran->waktu_kadaluarsa }}</p>
                                    <p class="mb-1"><span class="font-semibold">Status:</span>
                                        <span
                                            class="inline-block px-2 py-1 rounded text-xs font-medium
                                                                                            @if($penawaran->status == 'Tersedia') bg-green-100 text-green-700
                                                                                            @elseif($penawaran->status == 'Kadaluarsa') bg-red-100 text-red-700
                                                                                            @else bg-yellow-100 text-yellow-700 @endif">
                                            {{ $penawaran->status }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-8 flex justify-center">
            {{ $penawarans->links() }}
        </div>
    </div>
@endsection