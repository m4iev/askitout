<x-layout>
    <section
        class="relative h-full bg-gradient-to-br from-teal-600 via-blue-500 to-rose-500"
    >
        <div
            class="absolute inset-0 bg-gray-900/75 sm:bg-transparent sm:from-gray-900/95 sm:to-gray-900/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l">
        </div>

        <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
            <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                <h1 class="text-3xl font-extrabold text-white sm:text-5xl">
                    Ask

                    <strong class="block font-extrabold text-gray-700"> Anything. </strong>
                </h1>

                <p class="mt-4 max-w-lg text-white sm:text-xl/relaxed">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
                    numquam ea!
                </p>

                <div class="mt-8 flex flex-wrap gap-4 text-center">
                    <a href="{{ Auth::check() ? "/questions/create" : "/register" }}"
                        class="block w-full rounded bg-teal-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-rose-700 focus:outline-none focus:ring active:bg-rose-500 sm:w-auto">
                        Ask a question
                    </a>

                    <a href="/questions"
                        class="block w-full rounded bg-gray-800 px-12 py-3 text-sm font-medium text-white shadow hover:text-rose-700 focus:outline-none focus:ring active:text-rose-500 sm:w-auto">
                        View all questions
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
