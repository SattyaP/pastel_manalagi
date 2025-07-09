@extends('admin.layouts.app')
@section('title', 'List Feedback')
@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">List Feedback</li>
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

        @foreach ($penyalurans as $penyaluran)
            <div x-data="{ open: false }" class="bg-white shadow rounded-lg mb-6">
                <button @click="open = !open" class="w-full flex justify-between items-center p-6 focus:outline-none">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Penyaluran #{{ $penyaluran->penawaranSisaMakanan->produk->nama_produk }}
                        </h3>
                        <p class="text-gray-600 text-sm">Tanggal:
                            {{ \Carbon\Carbon::parse($penyaluran->tanggal_penyaluran)->format('d M Y') }}</p>
                    </div>
                    <svg :class="{ 'transform rotate-180': open }"
                        class="w-6 h-6 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="border-t px-6 pb-6 pt-4">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">
                        Dokumentasi
                    </h3>
                    @if ($penyaluran->image)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-4">
                            @foreach ($penyaluran->image as $foto)
                                <div class="bg-gray-100 p-4 rounded-lg shadow">
                                    <img src="{{ asset('storage/' . $foto) }}" alt="Dokumentasi Foto"
                                        class="w-full h-24 object-cover rounded-lg mb-2">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-yellow-600 font-semibold mb-4">Warning: Tidak ada dokumentasi yang tersedia.</p>
                    @endif

                    <p class="text-gray-600 mb-1">Kuantitas Diterima: {{ $penyaluran->kuantitas_diterima }}</p>
                    <p class="text-gray-600 mb-1">Tanggal Penyaluran:
                        {{ \Carbon\Carbon::parse($penyaluran->tanggal_penyaluran)->format('d M Y') }}
                    </p>
                    <p class="text-gray-600 mb-1">Status Pengiriman: {{ ucfirst($penyaluran->status_pengiriman) }}</p>
                    <p class="text-gray-600 mb-1">Catatan: {{ $penyaluran->catatan ?? '-' }}</p>
                    <div class="mt-4 flex flex-col items-end">
                        @if ($penyaluran->feedback)
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm mb-2">Feedback
                                sudah diberikan</span>
                        @else
                            <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm mb-2">Belum
                                diberi feedback</span>
                            <a href="{{ route('mitra.feedback.create', $penyaluran->id) }}"
                                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Beri
                                Feedback</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection