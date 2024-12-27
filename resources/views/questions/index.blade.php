<x-layout>
    <section>
        <div class="w-full flex flex-col items-center gap-6  mt-20">
            <h2 class="text-4xl text-white text-center font-bold">Find a Question</h2>
            <form action="" class="max-w-lg flex justify-between items-center">
                <input type="text" id="search" name="search" placeholder="Laravel routing..."
                    class="w-full rounded-xl border-gray-200 py-4 pe-10 shadow-sm sm:text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white border-2 border-transparent hover:border-gray-100 transition-colors duration-400" />
                <div>
                    <span class="w-10">
                        <button type="submit"
                            class="text-gray-600 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                            <span class="sr-only">Search</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-20">
        <x-section-header>Popular Question</x-section-header>

        <div class="flex flex-col items-center gap-4 mt-6">
            @foreach ($questions as $question)
            <x-question-card :$question></x-question-card>
            @endforeach
        </div>
    </section>

    <section class="mt-20 mb-20">
        <x-section-header box_color="amber-500">Recent Questions</x-section-header>

        <div class="flex flex-col items-center gap-4 mt-6">
            @foreach ($questions as $question)
            <x-question-card :$question></x-question-card>
            @endforeach
        </div>
    </section>
</x-layout>