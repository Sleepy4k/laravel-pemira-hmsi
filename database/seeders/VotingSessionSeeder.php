<?php

namespace Database\Seeders;

use App\Models\VotingSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VotingSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = VotingSession::factory()->make();

        VotingSession::insert($sessions->toArray());
    }
}
