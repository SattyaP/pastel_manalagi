@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="text-blue-500">#</li>
@endsection

@section('content')
    <div class="grid grid-cols-1 mt-4 md:grid-cols-2 xl:grid-cols-4 gap-6">
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
            <h2 class="text-2xl font-bold">120</h2>
        </div>
        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[1] }}">
            <p class="text-gray-600">Pengajuan Mitra</p>
            <h2 class="text-2xl font-bold">15</h2>
        </div>
        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[2] }}">
            <p class="text-gray-600">Feedback</p>
            <h2 class="text-2xl font-bold">23</h2>
        </div>
        <div class="bg-white p-4 shadow rounded-xl {{ $borderColors[3] }}">
            <p class="text-gray-600">Penyaluran</p>
            <h2 class="text-2xl font-bold">80</h2>
        </div>
    </div>
@endsection