<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MahoraPOS')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        *{font-family:'Inter',sans-serif}
        [x-cloak]{display:none!important}
        .sb-scroll::-webkit-scrollbar{width:0px}
    </style>
</head>
<body class="bg-[#f5f6fa] text-gray-900 antialiased">
<div class="flex h-screen overflow-hidden">

    @include('components.sidebar')

    <div class="flex flex-col flex-1 min-w-0 overflow-hidden">
        @include('components.navbar')

        <main class="flex-1 overflow-y-auto p-6">
            @hasSection('header')
                <div class="mb-6 flex items-center justify-between gap-4">
                    <div>
                        <h1 class="text-lg font-semibold text-gray-900">@yield('header')</h1>
                        @hasSection('subheader')
                            <p class="text-sm text-gray-400 mt-0.5">@yield('subheader')</p>
                        @endif
                    </div>
                    @hasSection('actions')
                        <div class="flex items-center gap-2 shrink-0">@yield('actions')</div>
                    @endif
                </div>
            @endif

            @if(session('success'))
                <div x-data="{s:true}" x-show="s" x-init="setTimeout(()=>s=false,4000)"
                     class="mb-4 flex items-center gap-2 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
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
