@extends('admin.layouts.app')

@section('title', 'Change Password')

@section('breadcrumb')
    <li class="text-gray-500">/</li>
    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
@endsection

@section('content')
    @if (auth()->user()->role === 'mitra')
        <div class="mb-6">
            <div class="bg-sky-100 border-l-4 border-sky-500 text-sky-700 p-4 rounded" role="alert">
                <p class="font-bold">Rekomendasi Untuk Ubah Password</p>
                <p>Setelah akun mitra anda telah dibuat rekomendasi untuk mengubah password anda untuk keamanan</p>
            </div>
        </div>
    @endif

    <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Change Password</h2>
        <form action="{{ route('account.update-password') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" name="new_password" id="new_password"
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New
                    Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Change
                Password</button>
        </form>
    </div>
@endsection