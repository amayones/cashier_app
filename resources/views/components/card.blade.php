@props(['title'=>'','value'=>'','icon'=>null,'color'=>'blue','trend'=>null,'trendUp'=>true,'sub'=>null])
@php
$p=['blue'=>['ib'=>'bg-blue-50','it'=>'text-blue-600'],'green'=>['ib'=>'bg-green-50','it'=>'text-green-600'],
    'amber'=>['ib'=>'bg-amber-50','it'=>'text-amber-600'],'rose'=>['ib'=>'bg-rose-50','it'=>'text-rose-600'],
    'purple'=>['ib'=>'bg-purple-50','it'=>'text-purple-600']];
$c=$p[$color]??$p['blue'];
@endphp
<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex items-start gap-4">
    @if($icon)
        <div class="p-2.5 rounded-xl {{ $c['ib'] }} {{ $c['it'] }} shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
            </svg>
        </div>
    @endif
    <div class="flex-1 min-w-0">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">{{ $title }}</p>
        <p class="mt-1 text-2xl font-bold text-gray-900 truncate">{{ $value }}</p>
        @if($trend)
            <p class="mt-1 text-xs font-medium {{ $trendUp?'text-green-600':'text-red-500' }}">{{ $trendUp?'▲':'▼' }} {{ $trend }}</p>
        @endif
        @if($sub)<p class="mt-0.5 text-xs text-gray-400">{{ $sub }}</p>@endif
    </div>
</div>
