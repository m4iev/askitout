<a {{ $attributes->merge(['class' => 'group inline-block rounded-full bg-gray-500 p-[2px] focus:outline-none focus:ring active:text-opacity-75']) }}>
    <span
        class="block rounded-full bg-gray-900 px-8 py-3 text-sm font-medium group-hover:bg-transparent text-white">
        {{ $slot }}
    </span>
</a>