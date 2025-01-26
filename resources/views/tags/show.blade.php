<x-layout>
    <section class="mb-20 mt-20">
        <x-section-header box_color="amber-500">Questions tagged {{ $tag->name }}</x-section-header>

        <div class="mt-6 flex flex-col items-center gap-4">
            @foreach ($questions as $question)
                <x-question-card :$question></x-question-card>
            @endforeach

            {{ $questions->links() }}
        </div>
    </section>
</x-layout>
