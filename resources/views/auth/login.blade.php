@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container mx-auto py-10">
        <div class="flex gap-1.5 text-md">
            <a href="/" class="text-[#454545]">Home</a>
            <span class="text-[#454545]"> / </span>
            <a href="{{ route('login') }}" class="text-blue-500">Login</a>
        </div>

        <div class="grid grid-cols-2 space-x-6 py-6">
            <div class="col-span-2 md:col-span-1">
                <h1 class="mt-4 text-3xl font-bold">Login</h1>
                <p class="mt-2 text-gray-600">Masuk untuk melanjutkan ke akun Anda.</p>

                <form action="{{ route('login.post') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-md font-normal text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="email@gmail.com">
                        @if ($errors->has('email'))
                            <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-md font-normal text-gray-700">Password</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="********">
                        @if ($errors->has('password'))
                            <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full bg-[#B81B33] cursor-pointer hover:bg-[#eb2240] font-semibold text-white py-3 px-4 mt-4 rounded-md transition duration-200">
                        Login
                    </button>
                </form>
            </div>

            <div class="col-span-2 md:col-span-1 mt-10 md:mt-0 flex flex-col items-center justify-center text-center">
                <h2 class="text-xl font-semibold mb-4">Belum punya akun?</h2>
                <p>Daftar sekarang untuk mendapatkan akses penuh ke semua fitur kami.</p>
                <a href="{{ route('registrasi.mitra') }}"
                    class="mt-4 inline-block bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition duration-200">
                    Daftar Sebagai Mitra
                </a>
            </div>
        </div>
    </div>
@endsection