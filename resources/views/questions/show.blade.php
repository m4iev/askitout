@php
    $question_vote = auth()
        ->user()
        ->votes()
        ->where("voteable_type", "=", "App\Models\Questions")
        ->where("voteable_id", "=", $question->id)
        ->get();
@endphp
<x-layout>
    <div class="mx-auto mt-3 w-full rounded-lg bg-gray-900 p-6 shadow md:w-3/4">
        {{-- Question Header --}}
        <div class="mb-6">
            <h1 class="mb-2 text-2xl font-bold text-white">
                {{ $question->title }}
            </h1>
            <div class="flex items-center text-sm text-white">
                <span class="mr-4">Asked {{ $question->created_at->diffForHumans() }}</span>
                <span class="-ml-3">by <a href="/users/{{ $question->user->id }}"
                        class="text-blue-600 hover:underline">{{ $question->user->name }}</a></span>
            </div>
        </div>

        {{-- Question Content --}}
        <div class="flex gap-6">
            {{-- Question Voting --}}
            <div class="flex flex-col items-center">
                <form action="/votes" method="POST">
                    @if (count($question_vote) == 1)
                        @if ($question_vote->vote == 1)
                            @method("DELETE")
                        @else
                            @method("PUT")
                        @endif
                    @endif
                    @csrf
                    <input type="hidden" name="voteable_type" value="App\Models\Question">
                    <input type="hidden" name="voteable_id" value="{{ $question->id }}">
                    <input type="hidden" name="vote" value="up">
                    <button type="submit" class="p-2 text-white transition-colors hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>
                </form>

                <span class="my-2 text-xl font-bold text-white">{{ count($question->votes) }}</span>

                <form action="/votes" method="POST">
                    @if (count($question_vote) == 1)
                        @if ($question_vote->vote == -1)
                            @method("DELETE")
                        @else
                            @method("PUT")
                        @endif
                    @endif
                    @csrf
                    <input type="hidden" name="voteable_type" value="App\Models\Question">
                    <input type="hidden" name="voteable_id" value="{{ $question->id }}">
                    <input type="hidden" name="vote" value="down">
                    <button type="submit" class="p-2 text-white transition-colors hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </form>
            </div>

            {{-- Question Body --}}
            <div class="flex-1">
                <div class="prose mb-6 max-w-none text-white">
                    {!! Str::markdown($question->body) !!}
                </div>

                {{-- Tags --}}
                <div class="mb-6 flex gap-2">
                    @foreach ($question->tags as $tag)
                        <a href="/tags/{{ $tag->name }}"
                            class="rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800 transition-colors hover:bg-blue-200">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Answer Section --}}
        <div class="mt-8 border-t border-gray-700 pt-6">
            <h2 class="mb-4 flex items-center gap-2 text-lg font-semibold text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Answers
            </h2>

            {{-- Answer List --}}
            <div class="space-y-4">
                @foreach ($question->answers as $answer)
                    @php
                        $answer_vote = auth()
                            ->user()
                            ->votes()
                            ->where("voteable_type", "=", "App\Models\Answers")
                            ->where("voteable_id", "=", $answer->id)
                            ->get();
                    @endphp
                    <div class="border-b border-gray-700 pb-4">
                        <div class="flex gap-6">
                            {{-- Answer Voting --}}
                            <div class="flex flex-col items-center">
                                <form action="/votes" method="POST">
                                    @if (count($answer_vote) == 1)
                                        @if ($answer_vote->vote == 1)
                                            @method("DELETE")
                                        @else
                                            @method("PUT")
                                        @endif
                                    @endif
                                    @csrf
                                    <input type="hidden" name="voteable_type" value="App\Models\Answer">
                                    <input type="hidden" name="voteable_id" value="{{ $answer->id }}">
                                    <input type="hidden" name="vote" value="up">
                                    <button type="submit" class="p-2 text-white transition-colors hover:text-teal-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                    </button>
                                </form>

                                <span class="my-1 text-lg font-bold text-white">{{ count($answer->votes) }}</span>

                                <form action="/votes" method="POST">
                                    @if (count($answer_vote) == -1)
                                        @if ($answer_vote->vote == 1)
                                            @method("DELETE")
                                        @else
                                            @method("PUT")
                                        @endif
                                    @endif
                                    @csrf
                                    <input type="hidden" name="voteable_type" value="App\Models\Answer">
                                    <input type="hidden" name="voteable_id" value="{{ $answer->id }}">
                                    <input type="hidden" name="vote" value="down">
                                    <button type="submit"
                                        class="p-2 text-white transition-colors hover:text-teal-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="flex-1">
                                <p class="mb-2 text-gray-300">{{ $answer->body }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <span class="mr-2">by <a href="/users/{{ $answer->user->id }}"
                                            class="text-blue-600 hover:underline">{{ $answer->user->name }}</a></span>
                                    <span>{{ $answer->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Answer Comments --}}
                        @if ($answer->comments->count() > 0)
                            <div class="ml-8 mt-4 space-y-4">
                                @foreach ($answer->comments as $comment)
                                    <div class="border-l-2 border-gray-700 pl-4">
                                        <div class="flex gap-6">
                                            <div class="flex-1">
                                                <p class="mb-2 text-gray-300">{{ $comment->body }}</p>
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <span class="mr-2">by <a href="/users/{{ $comment->user->id }}"
                                                            class="text-blue-600 hover:underline">{{ $comment->user->name }}</a></span>
                                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Add Comment to Answer Form --}}
                        @auth
                            <div class="ml-8 mt-4">
                                <form action="/comments" method="POST">
                                    @csrf
                                    <input type="hidden" name="commentable_id" value="{{ $answer->id }}">
                                    <input type="hidden" name="commentable_type" value="App\Models\Answer">
                                    <div class="flex gap-2">
                                        <input type="text" name="body"
                                            class="flex-1 rounded-lg border border-gray-700 bg-gray-800 p-2 text-white focus:border-transparent focus:ring-2 focus:ring-teal-500"
                                            placeholder="Add a comment to this answer...">
                                        <button type="submit"
                                            class="rounded-lg bg-teal-600 px-4 py-2 text-sm text-white transition-colors hover:bg-teal-700">
                                            Comment
                                        </button>
                                    </div>
                                    @error("body")
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </form>
                            </div>
                        @endauth
                    </div>
                @endforeach
            </div>

            {{-- Add Answer Form --}}
            @auth
                <form action="/answers" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <textarea name="body" placeholder="Write your answer..."
                        class="w-full rounded-lg border bg-gray-800 p-3 text-white focus:border-transparent focus:ring-2 focus:ring-blue-500"
                        rows="3" required></textarea>
                    @error("body")
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="mt-2 rounded-lg bg-teal-600 px-4 py-2 text-white transition-colors hover:bg-teal-700">
                        Post Answer
                    </button>
                </form>
            @else
                <p class="mt-6 text-gray-400">
                    Please <a href="/login" class="text-teal-500 hover:underline">login</a> to add an answer.
                </p>
            @endauth
        </div>
    </div>
</x-layout>
