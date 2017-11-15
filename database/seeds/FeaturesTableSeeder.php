<?php

use Illuminate\Database\Seeder;
use App\Feature;

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
            ['Auth system', 8, 7],
            ['To do list', 4, 5],
            ['Share blueprint', 6, 4],
            ['Quadrant graphic', 7, 8],
            ['Edit blueprint', 10, 3],
            ['Edit feature', 10, 3],
        ];

        $count = count($features);

        foreach ($features as $key => $feature) {
            Feature::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $feature[0],
                'value' => $feature[1],
                'complexity' => $feature[2],
            ]);
            $count--;
        }
    }
}
