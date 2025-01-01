<x-layout>
    <form action="/questions" method="POST" class="flex flex-col w-full items-center gap-6">
        @csrf
        <h1 class="text-center text-2xl font-bold text-white sm:text-3xl mt-20">Ask your question!</h1>

        <div class="w-3/4 md:w-1/2">
            <label for="questionTitle"
                class="relative block overflow-hidden rounded-md border border-gray-200 px-3 pt-3 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600 dark:border-gray-700 dark:bg-gray-800">
                <input type="text" id="questionTitle" placeholder="Title" name="title" value="{{ old('title') }}"
                    required
                    class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm dark:text-white" />
                <span
                    class="absolute start-3 top-3 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-3 peer-focus:text-xs dark:text-gray-200">
                    Title
                </span>
            </label>
        </div>

        <div class="w-3/4 md:w-1/2">
            <label for="questionBody" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                Order notes
            </label>

            <textarea id="questionBody"
                class="mt-2 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                rows="4" placeholder="Enter any additional order notes..." name="body"
                required>{{ old('body') }}</textarea>
        </div>

        <div class="w-3/4 md:w-1/2">
            <label for="questionTags"
                class="relative block overflow-hidden rounded-md border border-gray-200 px-3 pt-3 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600 dark:border-gray-700 dark:bg-gray-800">
                <input type="text" id="questionTags" placeholder="Tags" name="tags" value="{{ old('tags') }}" required
                    class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm dark:text-white" />
                <span
                    class="absolute start-3 top-3 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-3 peer-focus:text-xs dark:text-gray-200">
                    Tags (Separate by comma only)
                </span>
            </label>
        </div>

        <x-button class="w-3/4 md:w-1/2">Ask</x-button>
    </form>
</x-layout>