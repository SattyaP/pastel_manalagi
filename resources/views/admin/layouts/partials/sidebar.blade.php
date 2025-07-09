<aside class="w-64 bg-white shadow-md hidden md:block">
    <div class="p-6 font-bold text-lg">
        <a href="/">
            <img class="md:w-44 w-1/3" src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
    </div>

    <nav class="space-y-2 p-4" x-data="{
        openProduk: {{ request()->is('*produks*') ? 'true' : 'false' }},
        openDashboard: false,
        openMitra: false,
        openFeedback: false,
        openPenyaluran: false,
        openAccount: false,
    }">

        {{-- Dashboard --}}
        @can('admin')
            <a href="{{ route('dashboard') }}"
                class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*dashboard*') ? 'bg-blue-500 text-white' : '' }}">
                Dashboard
            </a>
        @endcan

        {{-- Produk with submenu (admin only) --}}
        @can('admin')
            <button @click="openProduk = !openProduk"
                class="w-full flex justify-between items-center py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*produks*') ? 'bg-blue-500 text-white' : '' }}">
                <span>Produks</span>
                <svg :class="{ 'rotate-180': openProduk }" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openProduk" class="ml-4 space-y-1" x-transition>
                <a href="{{ route('produks.index') }}"
                    class="block py-1 px-4 rounded hover:bg-blue-100 {{ request()->is('produks') ? 'bg-blue-500 text-white' : '' }}">
                    List Produk
                </a>
            </div>
        @endcan

        {{-- Pengajuan Mitra with submenu (admin only) --}}
        @can('admin')
            <button @click="openMitra = !openMitra"
                class="w-full flex justify-between items-center py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*pengajuan-mitra*') || request()->is('*mitra*') ? 'bg-blue-500 text-white' : '' }}">
                <span>Pengajuan Mitra</span>
                <svg :class="{ 'rotate-180': openMitra }" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openMitra" class="ml-4 space-y-1" x-transition>
                <a href="{{ route('pengajuan.mitra') }}" class="block py-1 px-4 rounded hover:bg-blue-100">
                    List Pengajuan
                </a>
                <a href="{{ route('mitra.index') }}" class="block py-1 px-4 rounded hover:bg-blue-100">
                    List Mitra
                </a>
            </div>
        @endcan

        {{-- Feedback with submenu (admin only) --}}
        @can('admin')
            <button @click="openFeedback = !openFeedback"
                class="w-full flex justify-between items-center py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*feedback*') ? 'bg-blue-500 text-white' : '' }}">
                <span>Feedback</span>
                <svg :class="{ 'rotate-180': openFeedback }" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openFeedback" class="ml-4 space-y-1" x-transition>
                <a href="{{ route('feedback.index') }}" class="block py-1 px-4 rounded hover:bg-blue-100">
                    List Feedback
                </a>
            </div>
        @endcan

        {{-- Penyaluran with submenu (admin only) --}}
        @can('admin')
            <button @click="openPenyaluran = !openPenyaluran"
                class="w-full flex justify-between items-center py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*penyaluran*') || request()->is('*penawaran*') ? 'bg-blue-500 text-white' : '' }}">
                <span>Penyaluran</span>
                <svg :class="{ 'rotate-180': openPenyaluran }" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openPenyaluran" class="ml-4 space-y-1" x-transition>
                <a href="{{ route('penyaluran.penawaran') }}" class="block py-1 px-4 rounded hover:bg-blue-100">
                    Penawaran Makanan
                </a>
                <a href="{{ route('penyaluran.index') }}" class="block py-1 px-4 rounded hover:bg-blue-100">
                    Pengajuan Penyaluran
                </a>
            </div>
        @endcan

        @if (auth()->user()->role == 'mitra')
            <a href="{{ route('penawaran.mitra') }}"
                class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*penawaran*') ? 'bg-blue-500 text-white' : '' }}">
                Penawaran Sisa Makanan
            </a>

            <a href="{{ route('mitra.feedback.index') }}"
                class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*feedback*') ? 'bg-blue-500 text-white' : '' }}">
                Feedback
            </a>
        @endif

        {{-- Account Management --}}
        <button @click="openAccount = !openAccount"
            class="w-full flex justify-between items-center py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*account*') ? 'bg-blue-500 text-white' : '' }}">
            <span>Account Management</span>
            <svg :class="{ 'rotate-180': openAccount }" class="w-4 h-4 transition-transform" fill="none"
                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div x-show="openAccount" class="ml-4 space-y-1" x-transition>
            <a href="{{ route('account.profile') }}" class="block py-1 px-4 rounded hover:bg-blue-100">
                Profile
            </a>
            <a href="{{ route('account.change-password') }}" class="block py-1 px-4 rounded hover:bg-blue-100">
                Change Password
            </a>
        </div>
    </nav>
</aside>