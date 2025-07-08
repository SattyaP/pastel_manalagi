@extends('admin.layouts.app')

@section('title', 'List Mitra')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="text-blue-500">List Mitra</li>
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

        @if(session('error'))
            <div class="mb-6">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error', 'Something went wrong!') }}</p>
                </div>
            </div>
        @endif
        
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left text-gray-600">Nama Mitra</th>
                    <th class="px-6 py-3 text-left text-gray-600">Penanggung Jawab</th>
                    <th class="px-6 py-3 text-left text-gray-600">Alamat</th>
                    <th class="px-6 py-3 text-left text-gray-600">Telepon</th>
                    <th class="px-6 py-3 text-left text-gray-600">Tanggal Pengajuan</th>
                    <th class="px-6 py-3 text-left text-gray-600">Status Verifikasi</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mitras as $mitra)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $mitra->nama_mitra }}</td>
                        <td class="px-6 py-4">{{ $mitra->penanggung_jawab }}</td>
                        <td class="px-6 py-4">{{ $mitra->alamat_lengkap }}</td>
                        <td class="px-6 py-4">{{ $mitra->nomor_telepon }}</td>
                        <td class="px-6 py-4">{{ $mitra->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4">
                            @if ($mitra->status_verifikasi === 'Terverifikasi')
                                <span class="inline-block px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                    {{ $mitra->status_verifikasi }}
                                </span>
                            @elseif ($mitra->status_verifikasi === 'Menunggu')
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                    {{ $mitra->status_verifikasi }}
                                </span>
                            @else
                                <span class="inline-block px-3 py-1 text-xs font-semibold text-gray-700 bg-gray-200 rounded-full">
                                    {{ $mitra->status_verifikasi }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('mitra.show', $mitra->id) }}"
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $mitras->links() }}
    </div>
@endsection
