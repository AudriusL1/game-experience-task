<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::factory()
            ->count(10)
            ->has(Feedback::factory()->count(20), 'feedbacks')
            ->create();
    }
}
