<x-layout>
    <section class="mt-20">
        <h2 class="text-4xl text-white text-center font-bold mb-8">All tags</h2>

        <div class="grid grid-cols-2 lg:grid-cols-8 gap-3 px-3 py-3 text-center">
            @foreach ($tags as $tag)
                <x-pill-btn href="/tag/{{ $tag->name }}">{{ $tag->name }}</x-pill-btn>
            @endforeach
        </div>
    </section>
</x-layout>