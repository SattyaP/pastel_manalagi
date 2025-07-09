<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('admin.layouts.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            {{-- Top Navbar --}}
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6">
                <h1 class="font-semibold text-lg">{{ Auth::user()->role === 'admin' ? 'Admin' : 'Mitra' }} Dashboard
                </h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm">Hi, {{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="text-blue-500 hover:underline"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </header>

            {{-- Content Area --}}
            <main class="flex-1 p-6 overflow-y-auto">

                {{-- Breadcrumb --}}
                @hasSection('breadcrumb')
                    <nav class="text-sm text-gray-500 mb-4">
                        <ol class="list-reset flex gap-2">
                            <li><a href="{{ Auth::user()->role === 'admin' ? route('dashboard') : route('mitra.dashboard') }}"
                                    class="text-blue-500 hover:underline">Dashboard</a>
                            </li>
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                @endif

                {{-- Page Title --}}
                <h2 class="text-2xl font-semibold mb-4 mt-6">@yield('title')</h2>

                {{-- Page Content --}}
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>