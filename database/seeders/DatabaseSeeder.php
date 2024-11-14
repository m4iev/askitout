<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vote;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class, TagSeeder::class]);

        $users = User::all();
        $tags = Tag::all();

        foreach ($users as $user) {
            // Each User make one question 
            $question = Question::factory()->create([
                'user_id' => $user->id
            ]);

            // Attach random tag to the question
            $random_tag = fake()->randomElement($tags)->name;
            $question->tag($random_tag);

            // Make an answer from another user
            $answer = Answer::factory()->create([
                'question_id' => $question->id,
                'user_id' => fake()->randomElement($users->except([$user]))
            ]);

            // Make a comment from another user either for the question or the answer (random)
            $commentable = fake()->randomElement([$question, $answer]);

            Comment::factory()->create([
                'user_id' => fake()->randomElement($users->except([$user])),
                'commentable_id' => $commentable,
                'commentable_type' => $commentable::class,
            ]);

            // Make a vote from another user either for the question or the answer (random)
            $voteable = fake()->randomElement([$question, $answer]);

            Vote::factory()->create([
                'user_id' => fake()->randomElement($users->except([$user])),
                'voteable_id' => $voteable,
                'voteable_type' => $voteable::class,
            ]);
        }
    }
}
