<?php

use Illuminate\Database\Seeder;
use App\Feature;
use App\Blueprint;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            ['Auth system', 8, 7, 'DWA15 P4'],
            ['To do list', 4, 5, 'DWA15 P4'],
            ['Share blueprint', 6, 4, 'Blueprint'],
            ['Quadrant graphic', 7, 8, 'Blueprint'],
            ['Edit blueprint', 9, 3, 'Blueprint'],
            ['Edit feature', 10, 3, 'Project X'],
        ];

        $count = count($features);

        foreach ($features as $key => $feature) {
            $blueprint_id = Blueprint::where('title', '=', $feature[3])->pluck('id')->first();

            Feature::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $feature[0],
                'value' => $feature[1],
                'complexity' => $feature[2],
                'priority' => Feature::getPriority($feature[1], $feature[2]),
                'blueprint_id' => $blueprint_id,
            ]);
            $count--;
        }
    }
}
