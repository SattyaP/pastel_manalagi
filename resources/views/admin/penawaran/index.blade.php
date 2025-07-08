@extends('admin.layouts.app')

@section('title', 'Penawaran Penyaluran')
@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Penawaran Penyaluran</li>
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

        <p class="mb-4">Daftar penawaran makanan yang tersedia untuk penyaluran.</p>

        <div class="mb-4">
            <a href="{{ route('penawaran.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                Tambah Penawaran
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Produk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kuantitas
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Satuan
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal
                            Penawaran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu
                            Kadaluarsa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($penawarans as $penawaran)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $penawaran->produk->nama_produk ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $penawaran->kuantitas }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $penawaran->satuan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $penawaran->tanggal_penawaran->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $penawaran->waktu_kadaluarsa ? $penawaran->waktu_kadaluarsa->format('d-m-Y H:i') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $status = ucfirst($penawaran->status);
                                    $bgClass = match ($status) {
                                        'Sudah Dibatalkan' => 'bg-red-100 text-red-800',
                                        'Tersedia' => 'bg-green-100 text-green-800',
                                        'Tersalurkan' => 'bg-blue-100 text-blue-800',
                                        default => 'bg-gray-100 text-gray-800',
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded {{ $bgClass }}">
                                    {{ $status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('penawaran.show', $penawaran->id) }}"
                                    class="text-blue-600 hover:text-blue-900">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection