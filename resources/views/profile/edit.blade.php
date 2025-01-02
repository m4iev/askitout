<x-layout>
    <h1 class="text-center text-2xl font-bold text-white sm:text-3xl mt-12">Profile Details</h1>

    <form action="/profiles/{{ Auth::user()->id }}" method="POST" id="ProfileForm" class="flex flex-col mx-auto px-3 w-3/4 md:w-1/2 mt-3 gap-3">
        @csrf
        @method('PATCH')
        <div>
            <label for="Name"
                class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600 dark:border-gray-700 dark:bg-gray-800">
                <span class="text-xs font-medium text-gray-700 dark:text-gray-200"> Name </span>

                <input type="text" id="Name" name="name" value="{{ $user_name }}"
                    class="mt-1 w-full border-none bg-transparent p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm dark:text-white" />
            </label>
        </div>
        <div class="flex gap-3 justify-end">
            <x-nav-button type="gray" href="/" align_self="start">Back</x-nav-button>
            <x-button type="confirmation">Update</x-button>
        </div>
    </form>
</x-layout>