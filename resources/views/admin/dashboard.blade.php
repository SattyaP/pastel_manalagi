@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="text-blue-500">#</li>
@endsection

@section('content')
    <div class="grid grid-cols-5 mt-4 gap-6">
        @php
            $borderColors = [
                'border-l-4 border-blue-500',
                'border-l-4 border-green-500',
                'border-l-4 border-yellow-500',
                'border-l-4 border-pink-500',
            ];
        @endphp

        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[0] }}">
            <p class="text-gray-600">Total Produks</p>
            <h2 class="text-2xl font-bold">{{ $totalProduk }}</h2>
        </div>
        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[1] }}">
            <p class="text-gray-600">Total Mitra</p>
            <h2 class="text-2xl font-bold">{{ $totalMitra }}</h2>
        </div>

        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[2] }}">
            <p class="text-gray-600">Total Penawaran Sisa Makanan</p>
            <h2 class="text-2xl font-bold">{{ $totalPenawaran }}</h2>
        </div>

        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[3] }}">
            <p class="text-gray-600">Total Penyaluran</p>
            <h2 class="text-2xl font-bold">{{ $totalPenyaluran }}</h2>
        </div>

        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[3] }}">
            <p class="text-gray-600">Total Penyaluran Selesai</p>
            <h2 class="text-2xl font-bold">{{ $totalPenyaluranSelesai }}</h2>
        </div>
    </div>
@endsection