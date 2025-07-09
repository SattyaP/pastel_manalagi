@extends('layouts.app')

@section('title', 'Registrasi Mitra')

@section('content')
    <div class="container mx-auto py-10">
        <!-- Breadcrumb -->
        <nav class="flex gap-1.5 text-md mb-6" aria-label="Breadcrumb">
            <a href="/" class="text-[#454545] hover:underline">Home</a>
            <span class="text-[#454545]">/</span>
            <span class="text-blue-500 font-semibold">Detail Product</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 rounded-lg  p-8">
            <!-- Product Image -->
            <div class="flex justify-center items-center">
                <img src="{{ $produk->foto_produk }}" alt="Product Image"
                    class="rounded-lg w-full max-w-sm object-cover shadow-md">
            </div>
            <!-- Product Details -->
            <div class="flex flex-col justify-center space-y-4">
                <h2 class="text-3xl font-bold text-gray-800">{{ $produk->nama_produk }}</h2>
                <p class="text-xl text-gray-700">
                    Price:
                    <span class="font-semibold text-yellow-600">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</span>
                </p>
                <p class="text-gray-600">{{ $produk->deskripsi }}</p>
                <a href="#"
                    class="bg-yellow-400 hover:bg-yellow-500 text-xl text-black font-semibold py-4 px-8 rounded-lg shadow transition-transform transform hover:scale-105 w-max">
                    Order Online
                </a>
            </div>
        </div>
    </div>
@endsection