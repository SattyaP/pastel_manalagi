@extends('admin.layouts.app')

@section('title', 'List Pengajuan Mitra')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Pengajuan Mitra</li>
@endsection

@section('content')
    <div class="mt-6">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-4 text-left">Nama Mitra</th>
                    <th class="px-6 py-4 text-left">Penanggung Jawab</th>
                    <th class="px-6 py-4 text-left">Alamat Lengkap</th>
                    <th class="px-6 py-4 text-left">Nomor Telepon</th>
                    <th class="px-6 py-4 text-left">Tanggal Pengajuan</th>
                    <th class="px-6 py-4 text-left">Status Verifikasi</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mitras as $mitra)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $mitra->nama_mitra }}</td>
                        <td class="px-6 py-4">{{ $mitra->penanggung_jawab }}</td>
                        <td class="px-6 py-4">{{ $mitra->alamat_lengkap }}</td>
                        <td class="px-6 py-4">{{ $mitra->nomor_telepon }}</td>
                        <td class="px-6 py-4">{{ $mitra->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('mitra.verifikasi', $mitra->id) }}" method="POST"
                                class="flex items-center space-x-2">
                                @csrf
                                @method('PATCH')
                                <select name="status_verifikasi" class="border rounded px-2 py-1">
                                    <option value="Menunggu"
                                        {{ $mitra->status_verifikasi == 'Menunggu' ? 'selected' : '' }}>
                                        Menunggu
                                    </option>
                                    <option value="Terverifikasi"
                                        {{ $mitra->status_verifikasi == 'Terverifikasi' ? 'selected' : '' }}>
                                        Terverifikasi</option>
                                    <option value="Ditolak" {{ $mitra->status_verifikasi == 'Ditolak' ? 'selected' : '' }}>
                                        Ditolak</option>
                                </select>
                                <button type="submit"
                                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Ubah</button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('mitra.show', $mitra->id) }}"
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada pengajuan mitra saat ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $mitras->links() }}
        </div>
    </div>
@endsection
