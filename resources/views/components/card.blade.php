@props(['title'=>'','value'=>'','icon'=>null,'color'=>'indigo','trend'=>null,'trendUp'=>true,'sub'=>null])
@php
$top=['blue'=>'border-t-blue-500','green'=>'border-t-emerald-500','amber'=>'border-t-amber-400','rose'=>'border-t-rose-500','purple'=>'border-t-violet-500','indigo'=>'border-t-indigo-500'];
$t=$top[$color]??$top['indigo'];
@endphp
<div class="bg-white rounded-xl border border-gray-100 border-t-2 {{ $t }} p-5">
    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mb-3">{{ $title }}</p>
    <p class="text-2xl font-semibold text-gray-900 truncate">{{ $value }}</p>
    @if($trend)
        <p class="mt-2 text-xs font-medium {{ $trendUp?'text-emerald-600':'text-red-500' }}">
            {{ $trendUp?'↑':'↓' }} {{ $trend }}
        </p>
    @endif
    @if($sub)<p class="mt-0.5 text-xs text-gray-400">{{ $sub }}</p>@endif
</div>
