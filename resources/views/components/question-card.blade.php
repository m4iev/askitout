@props(['question'])
@php
$answer_count = isset($question->answers) ? count($question->answers) : 0;
$comment_count = isset($question->comments) ? count($question->comments) : 0;
$total_respond = $answer_count + $comment_count;
$image_path = $question->user->photo ? asset('storage/' . $question->user->photo) :
Vite::asset('resources/images/blank_profile.jpg');
@endphp

    <div
        class="flex items-start gap-4 p-4 sm:p-6 lg:p-8 rounded-xl border-2 border-transparent hover:border-gray-100 hover:cursor-pointer bg-gray-800 mx-4 transition-colors duration-500 group w-3/4">
            <div class="block shrink-0">
                <img src="{{ $image_path }}" class="size-14 rounded-lg object-cover" />
            </div>
            <div>
                <h3 class="font-medium sm:text-lg text-white">
                    {{ $question->title }}
                </h3>
                <p class="font-light line-clamp-2 text-sm text-white">
                    {{ $question->body }}
                </p>
                <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                    <div class="flex items-center gap-1 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                        <p class="text-xs">{{ $total_respond }} {{ $total_respond > 1 ? 'responds' : 'respond' }}</p>
                    </div>
                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                    <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                        Asked {{ $question->created_at }} by
                        <a href="/user/{{ $question->user->id }}" class="font-medium underline hover:text-gray-700">{{
                            $question->user->name }}</a>
                    </p>
                </div>
            </div>
    </div>