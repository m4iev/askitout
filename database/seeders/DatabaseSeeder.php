<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            QuestionSeeder::class,
            AnswerSeeder::class,
            TagSeeder::class,
            CommentSeeder::class,
            VoteSeeder::class
        ]);
    }
}
