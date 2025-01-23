<x-layout>
    <h1 class="mt-12 text-center text-2xl font-bold text-white sm:text-3xl">Profile Details</h1>

    <form action="/profiles/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" id="ProfileForm"
        class="mx-auto mt-3 flex w-3/4 flex-col gap-3 px-3 md:w-1/2">
        @csrf
        @method("PUT")
        <div>
            <label for="Name"
                class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600 dark:border-gray-700 dark:bg-gray-800">
                <span class="text-xs font-medium text-gray-700 dark:text-gray-200"> Name </span>

                <input type="text" id="Name" name="name" value="{{ $user_name }}"
                    class="mt-1 w-full border-none bg-transparent p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm dark:text-white" />
            </label>
        </div>

        <div class="relative">
            <label title="Click to upload your profile picture" for="profile_pic"
                class="group flex cursor-pointer items-center gap-4 px-6 py-4 before:absolute before:inset-0 before:rounded-3xl before:border before:border-dashed before:border-gray-400/60 before:bg-gray-100 before:transition-transform before:duration-300 hover:before:scale-105 hover:before:border-gray-300 active:duration-75 active:before:scale-95">
                <div class="relative w-max">
                    <img class="w-12" src="https://www.svgrepo.com/show/485545/upload-cicle.svg"
                        alt="file upload icon" width="512" height="512">
                </div>
                <div class="relative">
                    <span class="relative block text-base font-semibold text-blue-900 group-hover:text-blue-500">
                        Upload your profile picture
                    </span>
                    <span class="mt-0.5 block text-sm text-gray-500">Max 2 MB</span>
                </div>
            </label>
            <input hidden="" type="file" name="profile_pic" id="profile_pic">
        </div>

        <div class="flex justify-end gap-3">
            <x-nav-button type="gray" href="/" align_self="start">Back</x-nav-button>
            <x-button type="confirmation">Update</x-button>
        </div>
    </form>

    <section class="mb-20 mt-20">
        <x-section-header box_color="amber-500">Your Questions</x-section-header>

        <div class="mx-auto mt-6 flex w-1/2 flex-col items-center gap-4">
            @foreach ($questions as $question)
                <div class="w-full flex items-center">
                    <x-question-card :$question></x-question-card>
                    <div class="mt-2 flex gap-2">
                        <!-- Edit Button -->
                        <a href="/questions/{{ $question->id }}/edit"
                            class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                            Edit
                        </a>
                        <!-- Delete Button -->
                        <form action="/questions/{{ $question->id }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this question?');">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            {{ $questions->links() }}
        </div>
    </section>
</x-layout>
