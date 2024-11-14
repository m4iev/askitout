<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commentable = [
            Question::class,
            Answer::class
        ];

        $commentable_type = fake()->randomElement($commentable);
        
        return [
            'user_id' => User::factory(),
            'commentable_id' => $commentable_type::factory(), // belum tau work atau tidak
            'commentable_type' => $commentable_type,
            'body' => fake()->sentence()
        ];
    }
}
