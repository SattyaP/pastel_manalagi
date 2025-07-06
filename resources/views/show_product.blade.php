@extends('layouts.app')

@section('title', 'Registrasi Mitra')

@section('content')
    <div class="container mx-auto py-10">
        <div class="flex gap-1.5 text-md">
            <a href="/" class="text-[#454545]">Home</a>
            <span class="text-[#454545]"> / </span>
            <a href="#" class="text-blue-500">Detail Product</a>w
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-6">
            <!-- Left: Product Image -->
            <div class="flex justify-center items-center">
                <img src="https://via.placeholder.com/400x400" alt="Product Image"
                    class="rounded-lg w-full max-w-md object-cover">
            </div>
            <!-- Right: Product Details -->
            <div class="flex flex-col justify-center">
                <h2 class="text-2xl font-bold mb-4">Product Name</h2>
                <p class="text-lg text-gray-700 mb-2">Price: <span class="font-semibold">Rp 0</span></p>
                <p class="text-gray-600 mb-4">Product description goes here.</p>

                <div class="flex items-center gap-4">
                    <a href="#"
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                        Add to Cart
                    </a>
                    <a href="#"
                        class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition duration-200">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
