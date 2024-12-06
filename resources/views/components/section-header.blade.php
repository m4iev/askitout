@props(['text_color' => 'white'])
<div {{ $attributes->merge(['class' => 'flex items-center gap-2 justify-center']) }}>
    <span>
        <div class="w-4 h-4 bg-gray-950"></div>
    </span>
    <h2 class="text-3xl text-{{ $text_color }} text-left font-bold">{{ $slot }}</h2>
</div>