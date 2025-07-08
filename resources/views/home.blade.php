@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div style="background-image: url('{{ asset('images/bg-hero.png') }}');"
        class="bg-cover bg-center h-[80vh] flex flex-col items-center justify-center bg-no-repeat relative">
        <div class="text-center text-white mt-4">
            <h1 class="text-6xl leading-18 font-bold mb-12">SPESIAL OLEH-OLEH PASTEL, </br> DONAT LABU & TAHU ISI SPESIAL
                </br>
                MALANG
            </h1>
            <a href="#"
                class="bg-yellow-400 hover:bg-yellow-500 text-xl text-black transform hover:scale-105 transition-transform duration-300 font-semibold py-4 px-8 rounded inline-block">
                Order Online
            </a>
        </div>
        <nav id="main-navbar" class="fixed top-22 left-0 w-full z-20 transition-all duration-300 bg-none">
            <div class="container mx-auto flex justify-center items-center py-4">
                <ul class="flex space-x-10 font-semibold text-white text-lg">
                    <li><a href="" class="hover:underline">Home</a></li>
                    <li><a href="" class="hover:underline">About us</a></li>
                    <li><a href="" class="hover:underline">Product</a></li>
                    <li><a href="" class="hover:underline">Contact us</a></li>
                    @auth
                        <li><a href="{{ route('registrasi.mitra') }}" class="hover:underline">Jadi Mitra</a></li>
                        <li><a href="{{ Auth::user()->role === 'admin' ? route('dashboard') : route('mitra.dashboard') }}"
                                class="hover:underline">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                        <li><a href="{{ route('registrasi.mitra') }}" class="hover:underline">Jadi Mitra</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>

    <div
        class="container bg-white border mx-auto border-gray-300 rounded-2xl py-12 px-20 relative z-10 -mt-20 flex justify-between items-center">
        <div>
            <h2 class="font-bold text-3xl mb-2">Mau jadi Bagian Mitra Penyaluran kami ? </h2>
            <a class="text-blue-500" href="">Pelajari sekarang</a>
        </div>

        <a class="bg-[#B81B33] hover:bg-[#eb2240] py-4 px-8 text-lg underline-offset-1 font-semibold transform hover:scale-105 transition-transform duration-300 rounded-lg text-white"
            href="">Daftar Sekarang</a>
    </div>

    <div class="container mx-auto mt-20">
        <h3 class="text-3xl font-bold"><span class="text-[#B81B33]">Kami,</span> Pastel Manalagi</h3>
        <p class="mt-4 text-justify text-xl">UMKM kuliner asal Malang yang terkenal dengan pastel jumbo homemade dan aneka
            jajanan
            tradisional
            dengan isi
            berbagai rasa. Dibuat dari resep turun-temurun sejak 1990-an tanpa kompromi soal rasa. Kini hadir online untuk
            memudahkan Anda mengenal, memesan, dan ikut berbagi lewat fitur Byte Cycle—program donasi makanan berlebih kami.
        </p>

        <h3 class="text-3xl font-bold mt-20">History kami</h3>

        <div class="flex justify-between items-center text-center mt-12">
            <div class="flex flex-col items-center justify-center">
                <img class="w-28 mb-3" src="{{ asset('images/resep.png') }}" alt="">
                <h5 class="font-semibold text-xl">Resep turun temurun </br> sejak 1990-an</h5>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img class="w-24 mb-3" src="{{ asset('images/gerai.png') }}" alt="">
                <h5 class="font-semibold text-xl">Buka gerai resmi pada </br> tahun 2010</h5>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img class="w-20 mb-3" src="{{ asset('images/social.png') }}" alt="">
                <h5 class="font-semibold text-xl">Inisiatif sosial melalui Byte Cycle </br> mulai tahun 2025</h5>
            </div>
        </div>
    </div>

    <div class="bg-white mt-20 py-20">
        <div class="container mx-auto flex justify-between space-x-6">
            <div class="relative w-2/5 h-96">
                <img src="{{ asset('images/ilustration_homepage.png') }}" alt="Background"
                    class="w-full h-full object-cover rounded-xl">

                <div class="absolute inset-0 bg-black opacity-50 rounded-xl"></div>
                <div class="absolute inset-0 flex flex-col items-start justify-end p-8">
                    <div class="text-white text-2xl font-bold mb-2">
                        Penyaluran Makanan Berlebih
                    </div>
                    <div class="text-[#DBDBDB] text-lg">
                        Untuk orang - orang diluar sana yang membutuhkan
                        menjadi sumber makanan dan terbantu
                    </div>
                </div>
            </div>

            <div class="w-1/2 flex flex-col justify-center">
                <h3 class="text-3xl font-bold">Kami Menjalankan Sebuah Program <span class="text-[#B81B33]">Byte
                        Cycle</span> Program Donasi
                    Makanan</h3>

                <p class="mt-12 text-xl">Byte Cycle adalah inisiatif sosial dari Pastel Manalagi untuk mendistribusikan
                    makanan
                    berlebih kepada
                    pihak yang membutuhkan, seperti panti asuhan dan lembaga sosial. Melalui sistem ini, kami menghubungkan
                    donatur dengan penerima manfaat secara cepat, transparan, dan terorganisir.
                    Bersama Byte Cycle, setiap pastel lebih bermakna.</p>

                <a class="bg-[#B81B33] hover:bg-[#eb2240] w-fit mt-12 py-4 px-8 text-lg underline-offset-1 font-semibold transform hover:scale-105 transition-transform duration-300 rounded-lg text-white"
                    href="">Daftar Sekarang</a>
            </div>
        </div>

        <div class="container mx-auto mt-30">
            <h3 class="text-3xl text-center font-bold">Produk Kami</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-12">
                @foreach ($produks as $produk)
                    <a href="{{ route('show.product', $produk->id) }}"
                        class="bg-white shadow-lg rounded-xl overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer group">
                        <img src="{{ $produk->foto_produk }}" alt="Pastel Ayam (Rogout)"
                            class="w-full h-44 object-cover group-hover:opacity-90 transition-opacity duration-300">
                        <div class="p-5">
                            <h4
                                class="text-lg font-bold mb-1 text-gray-900 group-hover:text-[#B81B33] transition-colors duration-300">
                                {{ $produk->nama_produk }}
                            </h4>
                            <p class="text-gray-500 text-sm">{{ $produk->deskripsi }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('scroll', function () {
                const navbar = document.getElementById('main-navbar');
                if (window.scrollY > 30) {
                    navbar.classList.remove('bg-none');
                    navbar.classList.add('bg-[#B81B33]');
                } else {
                    navbar.classList.remove('bg-[#B81B33]');
                    navbar.classList.add('bg-none');
                }
            });
        </script>
    @endpush
@endsection