@props([
    'name'     => '',
    'desc'     => '',
    'price'    => 0,
    'period'   => 'bulan',
    'popular'  => false,
    'features' => [],
    'cta'      => 'Mulai Sekarang',
    'ctaHref'  => '/register',
    'custom'   => false,
])

<div class="relative bg-white rounded-xl border flex flex-col p-6
            {{ $popular ? 'border-indigo-300 shadow-lg shadow-indigo-100' : 'border-gray-100' }}">

    @if($popular)
        <div class="absolute -top-3 left-1/2 -translate-x-1/2">
            <span class="text-[11px] font-semibold px-3 py-1 bg-indigo-600 text-white rounded-full">Paling Populer</span>
        </div>
    @endif

    <div class="mb-5">
        <p class="text-sm font-semibold text-gray-900">{{ $name }}</p>
        <p class="text-xs text-gray-400 mt-1 leading-relaxed">{{ $desc }}</p>
    </div>

    <div class="mb-6 pb-6 border-b border-gray-100">
        @if($custom)
            <p class="text-3xl font-bold text-gray-900">Custom</p>
            <p class="text-xs text-gray-400 mt-1">Hubungi tim sales kami</p>
        @else
            <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($price, 0, ',', '.') }}</p>
            <p class="text-xs text-gray-400 mt-1">per {{ $period }}</p>
        @endif
    </div>

    <a href="{{ $ctaHref }}"
       class="block w-full py-2.5 text-center font-medium text-sm rounded-lg transition-colors mb-6
              {{ $popular ? 'bg-indigo-600 hover:bg-indigo-700 text-white' : 'bg-gray-50 hover:bg-gray-100 text-gray-700 border border-gray-200' }}">
        {{ $cta }}
    </a>

    <ul class="space-y-2.5 flex-1">
        @foreach($features as $f)
        <li class="flex items-start gap-2.5 text-sm {{ $f['ok'] ? 'text-gray-600' : 'text-gray-300' }}">
            @if($f['ok'])
                <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            @else
                <svg class="w-4 h-4 text-gray-200 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                </svg>
            @endif
            {{ $f['text'] }}
        </li>
        @endforeach
    </ul>
</div>
