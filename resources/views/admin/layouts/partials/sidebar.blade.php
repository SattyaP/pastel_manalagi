<aside class="w-64 bg-white shadow-md hidden md:block">
    <div class="p-6 font-bold text-lg">
        <a href="/">
            <img class="md:w-44 w-1/3" src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
    </div>
    <nav class="space-y-2 p-4">
        <a href="{{ route('dashboard') }}"
            class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*dashboard*') ? 'bg-blue-500 text-white' : '' }}">
            Dashboard
        </a>
        <a href="{{ route('produks.index') }}"
            class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*produks*') ? 'bg-blue-500 text-white' : '' }}">
            Produks
        </a>
        <a href="{{ route('pengajuan.mitra') }}"
            class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*pengajuan-mitra*') ? 'bg-blue-500 text-white' : '' }}">
            Pengajuan Mitra
        </a>
        <a href="{{ route('feedback.index') }}"
            class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*feedback*') ? 'bg-blue-500 text-white' : '' }}">
            Feedback
        </a>
        <a href="{{ route('penyaluran.index') }}"
            class="block py-2 px-4 rounded hover:bg-blue-100 {{ request()->is('*penyaluran*') ? 'bg-blue-500 text-white' : '' }}">
            Penyaluran
        </a>
    </nav>
</aside>