<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "vote" => ["required", Rule::in(["up", "down"])],
            "voteable_type" => ["required", Rule::in(["App\Models\Answer", "App\Models\Question"])],
            "voteable_id" => ["required"],
        ]);

        // add 5 reputation for the author, whether it is a positive vote or negative vote
        switch ($attributes["voteable_type"]) {
            case "App\Models\Answer":
                $answer = Answer::find($attributes["voteable_id"]);
                $answer->user->update([
                    'reputation' => $answer->user->reputation + 5,
                ]);
                break;
            default:
                $question = Question::find($attributes["voteable_id"]);
                $question->user->update([
                    'reputation' => $question->user->reputation + 5,
                ]);
                break;
        }

        $user = auth()->user();

        $attributes["vote"] = ($attributes["vote"] == "up") ? 1 : -1;

        $user->votes()->create($attributes);


        // add 2 reputation to user for voting activity
        $user->update([
            'reputation' => $user->reputation + 2
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        $request->validate([
            "vote" => ["required", Rule::in(["up", "down"])],
            "voteable_type" => ["required", Rule::in(["App\Models\Answer", "App\Models\Question"])],
            "voteable_id" => ["required"],
        ]);

        $vote = ($request["vote"] == "up") ? 1 : -1;

        $user_vote = auth()->user()->votes()->where("voteable_type", "=", $request['voteable_type'])
            ->where("voteable_id", "=", $request['voteable_id'])
            ->first();

        $user_vote->vote = $vote;

        $user_vote->save();

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Vote $vote)
    {
        $request->validate([
            "voteable_type" => ["required", Rule::in(["App\Models\Answer", "App\Models\Question"])],
            "voteable_id" => ["required"],
        ]);

        $user_vote = auth()->user()->votes()->where("voteable_type", "=", $request['voteable_type'])
            ->where("voteable_id", "=", $request['voteable_id'])
            ->delete();

        return back();
    }
}
