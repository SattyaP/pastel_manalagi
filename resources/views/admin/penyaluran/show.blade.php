@extends('admin.layouts.app')
@section('title', 'Detail Penyaluran')
@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Detail Penyaluran</li>
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
            <h3 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">Informasi Penyaluran</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="mb-2"><span class="font-semibold text-gray-700">ID Penyaluran:</span> {{ $penyaluran->id }}
                    </p>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Nama Mitra:</span>
                        {{ $penyaluran->mitra->nama_mitra }}</p>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Produk:</span>
                        {{ $penyaluran->penawaranSisaMakanan->produk->nama_produk }}</p>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Kuantitas:</span>
                        {{ $penyaluran->penawaranSisaMakanan->kuantitas }} {{ $penyaluran->penawaranSisaMakanan->satuan }}
                    </p>
                </div>
                <div>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Tanggal Penyaluran:</span>
                        {{ $penyaluran->tanggal_penyaluran->format('d-m-Y') }}</p>
                    <p class="mb-2 flex items-center">
                        <span class="font-semibold text-gray-700 mr-2">Status:</span>
                        @php
                            $status = strtolower($penyaluran->status_pengiriman);
                            $badgeClasses = [
                                'selesai' => 'bg-green-100 text-green-800 border-green-400',
                                'proses' => 'bg-yellow-100 text-yellow-800 border-yellow-400',
                                'batal' => 'bg-red-100 text-red-800 border-red-400',
                                'default' => 'bg-gray-100 text-gray-800 border-gray-400',
                            ];
                            $class = $badgeClasses[$status] ?? $badgeClasses['default'];
                        @endphp
                        <span class="inline-block px-3 py-1 rounded-full border text-sm font-semibold {{ $class }}">
                            {{ ucfirst($penyaluran->status_pengiriman) }}
                        </span>
                    </p>
                </div>
            </div>

            @if ($penyaluran->status == 'selesai')
                <div class="mt-8 border-t pt-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Informasi Tambahan</h3>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Tanggal Selesai:</span>
                        {{ $penyaluran->tanggal_selesai->format('d-m-Y') }}</p>
                    <p class="mb-2"><span class="font-semibold text-gray-700">Keterangan:</span>
                        {{ $penyaluran->keterangan }}</p>
                </div>
            @endif
        </div>

        <div class="bg-white shadow-lg rounded-xl p-8 mt-4">
            <h3 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">
                Dokumentasi {{ is_countable($penyaluran->image) ? count($penyaluran->image) : 0 }} / 3
            </h3>

            @if ($penyaluran->image)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($penyaluran->image as $foto)
                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <img src="{{ asset('storage/' . $foto) }}" alt="Dokumentasi Foto"
                                class="w-full h-48 object-cover rounded-lg mb-2">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-yellow-600 font-semibold">Warning: Tidak ada dokumentasi yang tersedia.</p>
            @endif

            @if ((is_countable($penyaluran->image) ? count($penyaluran->image) : 0) >= 3)
                <p class="text-red-500 text-sm">Anda sudah mencapai batas maksimal upload dokumentasi (3 foto).</p>
            @else
                <div class="mt-6">
                    <form action="{{ route('penyaluran.upload_dokumentasi', $penyaluran->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="dokumentasi" class="block text-gray-700 font-semibold mb-2">Upload Dokumentasi
                                Foto</label>
                            <input type="file" name="dokumentasi[]" id="dokumentasi"
                                class="block w-full text-gray-700 border border-gray-300 rounded-lg p-2" multiple
                                accept="image/*">
                            @error('dokumentasi')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <p class="text-gray-500 text-sm">Maksimal 3 foto, ukuran maksimal 2MB per foto.</p>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                            Upload Dokumentasi
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('penyaluran.index') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                Kembali ke Daftar Penyaluran
            </a>
        </div>
    </div>
@endsection