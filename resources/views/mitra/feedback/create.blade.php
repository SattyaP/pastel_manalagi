@extends('admin.layouts.app')

@section('title', 'Beri Kami Feedback')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Beri Kami Feedback</li>
@endsection

@section('content')
    <div class="mt-8">
        @if (session('success'))
            <div class="mb-6">
                <div class="bg-green-50 border-l-4 border-green-600 text-green-800 p-4 rounded shadow-sm flex items-center gap-3"
                    role="alert">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <p class="font-semibold">Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6">
                <div class="bg-red-50 border-l-4 border-red-600 text-red-800 p-4 rounded shadow-sm flex items-center gap-3"
                    role="alert">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <div>
                        <p class="font-semibold">Error</p>
                        <p>{{ session('error', 'Something went wrong!') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white shadow rounded-lg p-6 mb-6 flex flex-col md:flex-row items-center justify-between">
            <h3 class="text-2xl font-bold text-gray-800 border-b w-full pb-3">
                {{ $penyaluran->penawaranSisaMakanan->produk->nama_produk }} - Berikan Feedback
            </h3>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-8 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Feedback Mitra</h2>
            <p class="text-gray-700 mb-6">Silakan berikan feedback Anda mengenai pengalaman Anda sebagai mitra kami.</p>

            <form action="{{ route('mitra.feedback.store') }}" method="POST">
                @csrf

                <input type="hidden" name="penyaluran_id" value="{{ $penyaluran->id }}">

                <div class="mb-4">
                    <label for="komentar" class="block text-sm font-medium text-gray-700">Feedback</label>
                    <textarea id="komentar" name="komentar" rows="4"
                        class="mt-1 block p-3 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('komentar') }}</textarea>
                    @error('komentar')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                    <select id="rating" name="rating"
                        class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="" disabled {{ old('rating') ? '' : 'selected' }}>Pilih rating</option>
                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 - Sangat Buruk</option>
                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 - Buruk</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 - Cukup</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 - Baik</option>
                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 - Sangat Baik</option>
                    </select>
                    @error('rating')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Kirim Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection