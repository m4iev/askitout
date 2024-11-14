<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $voteable = [
            Question::class,
            Answer::class
        ];

        $voteable_type = fake()->randomElement($voteable);

        return [
            'user_id' => User::factory(),
            'voteable_id' => $voteable_type::factory(),
            'voteable_type' => $voteable_type,
            'vote' => fake()->numberBetween(0, 1)
        ];
    }
}
