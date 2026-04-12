@props([
    'name'     => '',
    'desc'     => '',
    'price'    => 0,
    'period'   => 'bulan',
    'color'    => 'blue',
    'popular'  => false,
    'features' => [],
    'cta'      => 'Mulai Sekarang',
    'ctaHref'  => '/register',
    'custom'   => false,
])
@php
$palette = [
    'blue'   => ['ring'=>'ring-blue-500',  'badge'=>'bg-blue-50 text-blue-700',   'btn'=>'bg-blue-600 hover:bg-blue-700 text-white',    'border'=>'border-blue-200'],
    'purple' => ['ring'=>'ring-purple-500','badge'=>'bg-purple-50 text-purple-700','btn'=>'bg-purple-600 hover:bg-purple-700 text-white', 'border'=>'border-purple-200'],
    'gray'   => ['ring'=>'ring-gray-400',  'badge'=>'bg-gray-100 text-gray-700',   'btn'=>'bg-gray-900 hover:bg-gray-800 text-white',    'border'=>'border-gray-200'],
];
$p = $palette[$color] ?? $palette['blue'];
@endphp

<div class="relative bg-white rounded-2xl border {{ $p['border'] }} shadow-sm p-7 flex flex-col
            {{ $popular ? 'ring-2 '.$p['ring'].' ring-offset-2 scale-105' : '' }}">

    @if($popular)
        <div class="absolute -top-4 left-1/2 -translate-x-1/2">
            <span class="text-xs font-bold px-4 py-1.5 bg-purple-600 text-white rounded-full shadow-md">⭐ Paling Populer</span>
        </div>
    @endif

    <div class="mb-5">
        <span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $p['badge'] }}">{{ $name }}</span>
        <p class="text-sm text-gray-500 mt-2 leading-relaxed">{{ $desc }}</p>
    </div>

    <div class="mb-6">
        @if($custom)
            <p class="text-3xl font-extrabold text-gray-900">Custom</p>
            <p class="text-sm text-gray-400 mt-1">Hubungi tim sales kami</p>
        @else
            <p class="text-3xl font-extrabold text-gray-900">Rp {{ number_format($price, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-400 mt-1">per {{ $period }}</p>
        @endif
    </div>

    <a href="{{ $ctaHref }}"
       class="block w-full py-3 text-center font-bold text-sm rounded-xl transition-colors mb-6 {{ $p['btn'] }}">
        {{ $cta }}
    </a>

    <ul class="space-y-2.5 flex-1">
        @foreach($features as $f)
        <li class="flex items-start gap-2.5 text-sm {{ $f['ok'] ? 'text-gray-700' : 'text-gray-300' }}">
            @if($f['ok'])
                <svg class="w-4 h-4 text-green-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            @else
                <svg class="w-4 h-4 text-gray-200 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            @endif
            {{ $f['text'] }}
        </li>
        @endforeach
    </ul>
</div>
