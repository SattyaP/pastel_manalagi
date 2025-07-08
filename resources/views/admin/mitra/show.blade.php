@extends('admin.layouts.app')

@section('title', 'View Mitra')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item"><a href="{{ route('mitra.index') }}">List Mitra</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Mitra</li>
@endsection

@section('content')
    <div class="mt-8 flex justify-center">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full">
            <div class="flex items-center mb-6">
                <div class="bg-blue-100 text-blue-600 rounded-full p-3 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800">{{ $mitra->nama_mitra }}</h2>
            </div>
            <div class="space-y-4 text-gray-700">
                <div class="flex items-center">
                    <span class="w-44 font-semibold">Penanggung Jawab:</span>
                    <span>{{ $mitra->penanggung_jawab }}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-44 font-semibold">Alamat Lengkap:</span>
                    <span>{{ $mitra->alamat_lengkap }}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-44 font-semibold">Nomor Telepon:</span>
                    <span>{{ $mitra->nomor_telepon }}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-44 font-semibold">Email:</span>
                    <span>{{ $mitra->email }}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-44 font-semibold">Keterangan:</span>
                    <span>{{ $mitra->keterangan }}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-44 font-semibold">Tanggal Pengajuan:</span>
                    <span>{{ $mitra->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-44 font-semibold">Status Verifikasi:</span>
                    <span>
                        @if ($mitra->status_verifikasi === 'Terverifikasi')
                            <span
                                class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Terverifikasi</span>
                        @else
                            <span
                                class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">{{ $mitra->status_verifikasi }}</span>
                        @endif
                    </span>
                </div>
            </div>

            @if ($mitra->dokumen_verifikasi && count($mitra->dokumen_verifikasi))
                <h3 class="mt-8 text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Dokumen Verifikasi</h3>
                <div class="flex flex-wrap gap-4">
                    @foreach ($mitra->dokumen_verifikasi as $index => $dokumen)
                        <button type="button" onclick="showModal('{{ asset('storage/' . $dokumen) }}')"
                            class="w-32 h-32 rounded-lg overflow-hidden border border-gray-200 shadow-sm bg-gray-50 flex items-center justify-center focus:outline-none">
                            <img src="{{ asset('storage/' . $dokumen) }}" alt="Gambar Mitra" class="object-cover w-full h-full">
                        </button>
                    @endforeach
                </div>

                <div id="dokumenModal"
                    class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg max-w-lg w-full relative">
                        <button onclick="closeModal()"
                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
                        <img id="modalImage" src="" alt="Dokumen" class="w-full h-auto max-h-[80vh] object-contain">
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="mt-8 flex justify-center">
        <a href="{{ url()->previous() }}"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            Kembali ke Sebelumnya
        </a>
    </div>
@endsection

@push('scripts')
    <script>
        function showModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('dokumenModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('dokumenModal').classList.add('hidden');
            document.getElementById('modalImage').src = '';
        }

        document.getElementById('dokumenModal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });
    </script>
@endpush