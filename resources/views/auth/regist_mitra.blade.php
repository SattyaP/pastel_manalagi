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

        <form class="py-10" action="">
            @csrf

            <div class="flex gap-4 mb-4">
                <div class="w-full">
                    <label for="first_name" class="block text-md font-normal text-gray-900">First Name <span
                            class="text-red-500"> *</span></label>
                    <div class="mt-2">
                        <input type="text" name="first_name" id="first_name"
                            class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                            placeholder="Masukkan nama depan" />
                    </div>
                </div>
                <div class="w-full">
                    <label for="last_name" class="block text-md font-normal text-gray-900">Last Name <span
                            class="text-red-500"> *</span></label>
                    <div class="mt-2">
                        <input type="text" name="last_name" id="last_name"
                            class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                            placeholder="Masukkan nama belakang" />
                    </div>
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="alamat" class="block text-md font-normal text-gray-900">Alamat <span class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="text" name="alamat" id="alamat"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="Jalan Tidar No 1" />
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="email" class="block text-md font-normal text-gray-900">Email <span class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="email" name="email" id="email"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="emailkamu@gmail.com" />
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="instansi" class="block text-md font-normal text-gray-900">Instansi <span class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="text" name="instansi" id="instansi"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="Panti Asuhan Malang" />
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="phone" class="block text-md font-normal text-gray-900">Phone <span class="text-red-500">
                        *</span></label>
                <div class="mt-2">
                    <input type="number" name="phone" id="phone"
                        class="block w-full rounded-md bg-white py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                        placeholder="082123232" />
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="keterangan" class="block text-md font-normal text-gray-900">Keterangan <span
                        class="text-red-500">
                        *</span></label>
                <textarea name="keterangan" id="keterangan" rows="4"
                    class="block w-full rounded-md bg-white mt-2 py-3 pl-3 pr-3 text-md text-gray-900 placeholder:text-gray-400 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600"
                    placeholder="Masukkan keterangan"></textarea>
            </div>

            <div class="flex items-center mb-6">
                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-[#B81B33] border-gray-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-gray-900">
                    Saya setuju dengan <a href="#" class="text-blue-500 underline">Syarat & Ketentuan</a> dan <a href="#"
                        class="text-blue-500 underline">Kebijakan Privasi</a>
                </label>
            </div>

            <button type="submit"
                class="w-full bg-[#B81B33] cursor-pointer hover:bg-[#eb2240] text-white py-3 rounded-md font-semibold transition">
                Daftar
            </button>
        </form>
    </div>
@endsection