@extends('admin.layouts.app')

@section('title', 'List Feedback')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">List Feedback</li>
@endsection

@section('content')
    <div class="mt-4">
        <div class="w-full">
            @if (session('success'))
                <div class="mb-4 p-4 rounded bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 rounded bg-red-100 text-red-800">
                    {{ session('error', 'Something went wrong!') }}
                </div>
            @endif

            <p class="mb-4">Daftar feedback yang telah diberikan oleh mitra.</p>

            <div class="bg-white shadow-md rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Mitra</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Penyaluran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Feedback</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $feedback->mitra->nama_mitra }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $feedback->penyaluran->penawaranSisaMakanan->produk->nama_produk }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $feedback->komentar }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $feedback->created_at->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($feedback->penyaluran->status_pengiriman == 'Proses')
                                        <span
                                            class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 font-semibold text-xs shadow">Proses</span>
                                    @elseif ($feedback->penyaluran->status_pengiriman == 'Selesai')
                                        <span
                                            class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-800 font-semibold text-xs shadow">Selesai</span>
                                    @elseif ($feedback->penyaluran->status_pengiriman == 'Dibatalkan')
                                        <span
                                            class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-800 font-semibold text-xs shadow">Dibatalkan</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection