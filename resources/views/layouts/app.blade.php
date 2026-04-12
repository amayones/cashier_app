<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MahoraPOS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak]{display:none!important}
        .sb-scroll::-webkit-scrollbar{width:3px}
        .sb-scroll::-webkit-scrollbar-thumb{background:#374151;border-radius:4px}
    </style>
</head>
<body class="bg-slate-50 text-gray-900 antialiased">
<div class="flex h-screen overflow-hidden">

    @include('components.sidebar')

    <div class="flex flex-col flex-1 min-w-0 overflow-hidden">
        @include('components.navbar')

        <main class="flex-1 overflow-y-auto @yield('mainClass', 'p-6')">
            @hasSection('header')
                <div class="mb-6 flex items-start justify-between gap-4">
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">@yield('header')</h1>
                        @hasSection('subheader')
                            <p class="text-sm text-gray-500 mt-0.5">@yield('subheader')</p>
                        @endif
                    </div>
                    @hasSection('actions')
                        <div class="flex items-center gap-2 shrink-0">@yield('actions')</div>
                    @endif
                </div>
            @endif

            @if(session('success'))
                <div x-data="{s:true}" x-show="s" x-init="setTimeout(()=>s=false,4000)"
                     class="mb-4 flex items-center gap-2 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                    <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>

        @include('components.footer')
    </div>
</div>
@stack('modals')
@stack('scripts')
</body>
</html>
