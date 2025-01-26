@php
    $image_path = $user->photo ? asset("storage/" . $user->photo) : Vite::asset("resources/images/blank_profile.jpg");
@endphp
<x-layout>
    <h1 class="mt-12 text-center text-2xl font-bold text-white sm:text-3xl">{{ $user->name }}'s Profile</h1>

    <div class="mx-auto mt-6 flex w-3/4 flex-col items-center gap-4 md:w-1/2">
        <div class="flex items-center gap-4">
            @if ($user->photo)
                <img src="{{ $image_path }}" alt="{{ $user->name }}'s Profile Picture" class="h-20 w-20 rounded-full">
            @else
                <div
                    class="flex h-20 w-20 items-center justify-center rounded-full bg-gray-200 text-2xl font-bold text-gray-500">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
            <div>
                <p class="text-lg font-semibold text-white">{{ $user->name }}</p>
                <p class="text-sm text-gray-400">Reputation: {{ $user->reputation }}</p>
            </div>
        </div>

        <section class="mt-10 w-full">
            <x-section-header box_color="amber-500">{{ $user->name }}'s Questions</x-section-header>

            <div class="mt-6 flex flex-col items-center gap-4">
                @foreach ($questions as $question)
                    <x-question-card :question="$question"></x-question-card>
                @endforeach

                {{ $questions->links() }}
            </div>
        </section>
    </div>
</x-layout>
