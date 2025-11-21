<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Timeline::query()->withoutCache()->count() > 0) return;

        $timelines = Timeline::factory()->make();

        Timeline::insert($timelines->toArray());
    }
}
