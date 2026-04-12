@props(['variant'=>'primary','size'=>'md','href'=>null,'type'=>'button','icon'=>null])
@php
$v=['primary'=>'bg-blue-600 hover:bg-blue-700 text-white shadow-sm','secondary'=>'bg-white hover:bg-gray-50 text-gray-700 border border-gray-200',
    'danger'=>'bg-red-600 hover:bg-red-700 text-white','success'=>'bg-green-600 hover:bg-green-700 text-white',
    'ghost'=>'text-gray-500 hover:bg-gray-100 hover:text-gray-700'];
$s=['sm'=>'px-3 py-1.5 text-xs','md'=>'px-4 py-2 text-sm','lg'=>'px-5 py-2.5 text-base'];
$cls='inline-flex items-center gap-2 font-semibold rounded-lg transition-colors '.($v[$variant]??$v['primary']).' '.($s[$size]??$s['md']);
@endphp
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class'=>$cls]) }}>
        @if($icon)<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>@endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class'=>$cls]) }}>
        @if($icon)<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>@endif
        {{ $slot }}
    </button>
@endif
