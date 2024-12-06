@props(['type' => 'primary'])
@php
    $class = 'rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium';
    if ($type === 'primary') {
        $class .= ' text-white shadow dark:hover:bg-teal-500';
    }

    if ($type === 'secondary') {
        $class .= ' text-teal-600 dark:bg-gray-800 dark:text-white dark:hover:text-white/75';
    }
@endphp

<a {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</a>