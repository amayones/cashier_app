<header class="h-14 bg-white border-b border-gray-100 flex items-center justify-between px-6 shrink-0">
    <div class="flex items-center gap-2">
        <span class="text-sm font-medium text-gray-700">Toko Mahora Jaya</span>
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span>
    </div>
    <div class="flex items-center gap-1">
        <button class="relative p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-50 transition-colors">
            <svg class="w-4.5 h-4.5" style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <div x-data="{open:false}" class="relative">
            <button @click="open=!open" @keydown.escape.window="open=false"
                    class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-gray-50 transition-colors ml-1">
                <div class="w-7 h-7 rounded-full bg-indigo-600 text-white flex items-center justify-center font-semibold text-xs shrink-0">AD</div>
                <span class="text-sm font-medium text-gray-700 hidden sm:block">Admin</span>
                <svg class="w-3 h-3 text-gray-400 transition-transform duration-150" :class="open&&'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div x-show="open" x-cloak @click.outside="open=false"
                 x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"  x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-1.5 w-44 bg-white rounded-xl shadow-lg border border-gray-100 py-1 z-50">
                <div class="px-3 py-2.5 border-b border-gray-100">
                    <p class="text-xs font-semibold text-gray-800">Admin Toko</p>
                    <p class="text-xs text-gray-400 mt-0.5">admin@mahora.id</p>
                </div>
                <a href="/profile" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 hover:bg-gray-50">Profile</a>
                <a href="/settings" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 hover:bg-gray-50">Pengaturan</a>
                <div class="border-t border-gray-100 my-1"></div>
                <a href="/login" class="flex items-center gap-2 px-3 py-2 text-sm text-red-500 hover:bg-red-50">Logout</a>
            </div>
        </div>
    </div>
</header>
