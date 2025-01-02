@props(['type' => 'primary', 'align_self' => 'auto'])
@php
    $class = 'rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium';
    if ($type === 'primary') {
        $class .= ' text-white shadow dark:hover:bg-teal-500';
    }

    if ($type === 'secondary') {
        $class .= ' text-teal-600 dark:bg-gray-800 dark:text-white dark:hover:text-white/75';
    }

    if ($type === 'warning') {
        $class .= ' text-teal-600 dark:bg-red-800 dark:text-white dark:hover:text-white/75';
    }

    if ($type === 'confirmation') {
        $class .= ' text-teal-600 dark:bg-green-800 dark:text-white dark:hover:text-white/75';
    }

    $class .= " self-{$align_self}";
@endphp

<button {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</button>