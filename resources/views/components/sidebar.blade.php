@php
$role  = 'admin';
$menus = [
    ['group'=>null,'items'=>[
        ['label'=>'Dashboard',   'url'=>'/dashboard',   'match'=>'dashboard',   'roles'=>['owner','admin','kasir','inventory','sysadmin'],'icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['label'=>'POS',         'url'=>'/pos',         'match'=>'pos',         'roles'=>['admin','kasir'],                               'icon'=>'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'],
    ]],
    ['group'=>'Manajemen','items'=>[
        ['label'=>'Produk',      'url'=>'/product',     'match'=>'product',     'roles'=>['admin','inventory'],                           'icon'=>'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
        ['label'=>'Stok',        'url'=>'/inventory',   'match'=>'inventory',   'roles'=>['admin','inventory'],                           'icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
        ['label'=>'Supplier',    'url'=>'/supplier',    'match'=>'supplier',    'roles'=>['admin','inventory'],                           'icon'=>'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4'],
        ['label'=>'Shift',       'url'=>'/shift',       'match'=>'shift',       'roles'=>['admin','kasir'],                               'icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
    ]],
    ['group'=>'Analitik','items'=>[
        ['label'=>'Laporan',     'url'=>'/report',      'match'=>'report',      'roles'=>['owner','admin'],                               'icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
    ]],
    ['group'=>'Sistem','items'=>[
        ['label'=>'User & Role', 'url'=>'/user',        'match'=>'user',        'roles'=>['admin','sysadmin'],                            'icon'=>'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
        ['label'=>'Pengaturan',  'url'=>'/settings',    'match'=>'settings',    'roles'=>['admin','sysadmin'],                            'icon'=>'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
    ]],
    ['group'=>'SaaS','items'=>[
        ['label'=>'Tenant',      'url'=>'/tenant',      'match'=>'tenant',      'roles'=>['sysadmin'],                                    'icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
        ['label'=>'Subscription','url'=>'/subscription','match'=>'subscription','roles'=>['sysadmin','owner'],                            'icon'=>'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
    ]],
];
@endphp

<aside class="w-56 bg-white border-r border-gray-100 flex flex-col shrink-0 h-full">
    {{-- Logo --}}
    <div class="h-14 flex items-center gap-2.5 px-5 shrink-0">
        <div class="w-7 h-7 bg-indigo-600 rounded-lg flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        <span class="font-semibold text-gray-900 text-[15px]">MahoraPOS</span>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto sb-scroll px-3 py-2">
        @foreach($menus as $section)
            @php $visible = collect($section['items'])->filter(fn($i) => in_array($role, $i['roles'])); @endphp
            @if($visible->isNotEmpty())
                @if($section['group'])
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest px-2 pt-5 pb-1.5">{{ $section['group'] }}</p>
                @endif
                @foreach($visible as $item)
                    @php $active = request()->is($item['match'].'*'); @endphp
                    <a href="{{ $item['url'] }}"
                       class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-sm transition-colors mb-0.5
                              {{ $active ? 'bg-indigo-50 text-indigo-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}">
                        <svg class="w-4 h-4 shrink-0 {{ $active ? 'text-indigo-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                        </svg>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            @endif
        @endforeach
    </nav>

    {{-- User --}}
    <div class="px-3 py-3 border-t border-gray-100 flex items-center gap-2.5 shrink-0">
        <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-xs font-semibold text-white shrink-0">AD</div>
        <div class="min-w-0">
            <p class="text-sm font-medium text-gray-800 truncate">Admin Toko</p>
            <p class="text-xs text-gray-400 truncate">admin@mahora.id</p>
        </div>
    </div>
</aside>
