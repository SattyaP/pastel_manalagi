@extends('layouts.app')

@section('title', 'Registrasi Mitra')

@section('content')
    <div class="container mx-auto py-10">
        <div class="flex gap-1.5 text-md">
            <a href="/" class="text-[#454545]">Home</a>
            <span class="text-[#454545]"> / </span>
            <a href="{{ route('registrasi.mitra') }}" class="text-blue-500">Daftar Sebagai Mitra</a>
        </div>

        <h1 class="mt-4 text-3xl font-bold">Daftar Sebagai Mitra Penyaluran</h1>

        <form class="py-10" action="{{ route('registrasi.mitra.post') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="flex gap-4 mb-4">
                <div class="w-full">
                    <label for="first_name" class="block text-md font-normal text-gray-900">First Name <span
                            class="text-red-500"> *</span></label>
                    <div class="mt-2">
                        <input type="text" name="first_name" id="first_name"
                            class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                            placeholder="Masukkan nama depan" value="{{ old('first_name') }}" />
                    </div>
                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="last_name" class="block text-md font-normal text-gray-900">Last Name <span
                            class="text-red-500"> *</span></label>
                    <div class="mt-2">
                        <input type="text" name="last_name" id="last_name"
                            class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                            placeholder="Masukkan nama belakang" value="{{ old('last_name') }}" />
                    </div>
                    @error('last_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="alamat_lengkap" class="block text-md font-normal text-gray-900">Alamat Lengkap <span
                        class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="text" name="alamat_lengkap" id="alamat_lengkap"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="Jalan Tidar No 1" value="{{ old('alamat_lengkap') }}" />
                </div>
                @error('alamat_lengkap')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-4">
                <label for="email" class="block text-md font-normal text-gray-900">Email <span class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="email" name="email" id="email"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="emailkamu@gmail.com" value="{{ old('email') }}" />
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-4">
                <label for="penanggung_jawab" class="block text-md font-normal text-gray-900">Instansi <span
                        class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="text" name="penanggung_jawab" id="penanggung_jawab"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="Panti Asuhan Malang" value="{{ old('penanggung_jawab') }}" />
                </div>
                @error('penanggung_jawab')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-4">
                <label for="nomor_telepon" class="block text-md font-normal text-gray-900">No Telp<span
                        class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="number" name="nomor_telepon" id="nomor_telepon"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="082123232" value="{{ old('nomor_telepon') }}" />
                </div>
                @error('nomor_telepon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-4">
                <label for="keterangan" class="block text-md font-normal text-gray-900">Keterangan <span
                        class="text-red-500">
                        *</span></label>
                <textarea name="keterangan" id="keterangan" rows="4"
                    class="block w-full rounded-md bg-white mt-2 py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                    placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-4">
                <label for="dokumen_verifikasi" class="block text-md font-normal text-gray-900">Dokumen Verifikasi
                    <span class="text-red-500"> *</span></label>
                <div class="mt-2">
                    <input type="file" name="dokumen_verifikasi[]" id="dokumen_verifikasi"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-md file:font-semibold file:bg-gray-100 file:text-gray-700"
                        multiple />
                </div>
                @error('dokumen_verifikasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                @if ($errors->has('dokumen_verifikasi.*'))
                    @foreach ($errors->get('dokumen_verifikasi.*') as $messages)
                        @foreach ($messages as $msg)
                            <p class="text-red-500 text-sm mt-1">{{ $msg }}</p>
                        @endforeach
                    @endforeach
                @endif
            </div>

            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-[#B81B33] border-gray-300 rounded" {{ old('terms') ? 'checked' : '' }}>
                <label for="terms" class="ml-2 block text-sm text-gray-900">
                    Saya setuju dengan <a href="#" class="text-blue-500 underline">Syarat & Ketentuan</a> dan <a href="#"
                        class="text-blue-500 underline">Kebijakan Privasi</a>
                </label>
            </div>
            @error('terms')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="w-full bg-[#B81B33] mt-4 cursor-pointer hover:bg-[#eb2240] text-white py-3 rounded-md font-semibold transition">
                Daftar
            </button>
        </form>
    </div>
@endsection