<?php

use Illuminate\Database\Seeder;
use App\Blueprint;

class BlueprintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blueprints = [
            ['DWA15 P4', true],
            ['Blueprint', false],
            ['Project X', true],
        ];

        $count = count($blueprints);

        foreach ($blueprints as $key => $blueprint) {
            Blueprint::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $blueprint[0],
                'map_legend' => $blueprint[1],
            ]);
            $count--;
        }
    }
}
