<x-layout>
    <h1 class="text-center text-2xl font-bold text-white sm:text-3xl mt-12">Profile Details</h1>

    <form action="/profiles/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" id="ProfileForm"
        class="flex flex-col mx-auto px-3 w-3/4 md:w-1/2 mt-3 gap-3">
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

        <div class="relative">
            <label title="Click to upload your profile picture" for="profile_pic"
                class="cursor-pointer flex items-center gap-4 px-6 py-4 before:border-gray-400/60 hover:before:border-gray-300 group before:bg-gray-100 before:absolute before:inset-0 before:rounded-3xl before:border before:border-dashed before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                <div class="w-max relative">
                    <img class="w-12" src="https://www.svgrepo.com/show/485545/upload-cicle.svg" alt="file upload icon"
                        width="512" height="512">
                </div>
                <div class="relative">
                    <span class="block text-base font-semibold relative text-blue-900 group-hover:text-blue-500">
                        Upload your profile picture
                    </span>
                    <span class="mt-0.5 block text-sm text-gray-500">Max 2 MB</span>
                </div>
            </label>
            <input hidden="" type="file" name="profile_pic" id="profile_pic">
        </div>
        
        <div class="flex gap-3 justify-end">
            <x-nav-button type="gray" href="/" align_self="start">Back</x-nav-button>
            <x-button type="confirmation">Update</x-button>
        </div>
    </form>
</x-layout>