@extends('admin.layouts.app')

@section('title', 'Account Profile')
@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Account Profile</li>
@endsection

@section('content')
    <div class="mt-8">
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

        @if (auth()->user()->role === 'mitra' && isset($mitra) && $mitra->status_verifikasi === 'Menunggu')
            <div class="mb-6">
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded" role="alert">
                    <p class="font-bold">Menunggu Verifikasi</p>
                    <p>Akun mitra Anda sedang dalam proses verifikasi. Mohon tunggu hingga proses selesai.</p>
                </div>
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Profile Information</h2>
            <form action="{{ route('account.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        required>
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Update
                    Profile</button>
            </form>
        </div>

        {{-- IF MITRA --}}
        @if (auth()->user()->role === 'mitra')
            <div class="bg-white p-6 mt-4 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Detail Information</h2>
                <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="nama_mitra" class="block text-sm font-medium text-gray-700">Nama Mitra</label>
                        <input type="text" name="nama_mitra" id="nama_mitra" value="{{ $mitra->nama_mitra }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="penanggung_jawab" class="block text-sm font-medium text-gray-700">Penanggung
                            Jawab</label>
                        <input type="text" name="penanggung_jawab" id="penanggung_jawab" value="{{ $mitra->penanggung_jawab }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <input type="text" name="alamat_lengkap" id="alamat_lengkap" value="{{ $mitra->alamat_lengkap }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ $mitra->nomor_telepon }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email_mitra" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email_mitra" id="email_mitra" value="{{ $mitra->email }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" value="{{ $mitra->keterangan }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
                        <input type="text" value="{{ $mitra->created_at->format('d M Y H:i') }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm bg-gray-100" readonly>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status Verifikasi</label>
                        <input type="text" value="{{ $mitra->status_verifikasi }}"
                            class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm bg-gray-100" readonly>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Update
                        Detail</button>
                </form>
            </div>
        @endif
    </div>
@endsection