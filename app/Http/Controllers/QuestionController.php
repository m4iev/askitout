<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::latest()->limit(3)->with(['user', 'tags', 'answers', 'comments'])->simplePaginate(3);

        return view('questions.index', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $questionAttributes = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'tags' => ['nullable']
        ]);

        $question = Auth::user()->questions()->create($questionAttributes);

        if ($questionAttributes['tags'] ?? false) {
            foreach (explode(',', $questionAttributes['tags']) as $tag) {
                $question->tag(name: $tag);
            }
        }

        return redirect("/questions/{$question->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        $question = Question::find($question->id);
        return view('questions.show', [
            'question' => $question
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
