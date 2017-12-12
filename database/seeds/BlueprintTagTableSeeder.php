<?php

use Illuminate\Database\Seeder;
use App\Blueprint;
use App\Tag;

class BlueprintTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blueprints =[
            'DWA15 P4' => 'Personal',
            'Blueprint' => 'Internal Project',
            'Project X' => 'Freelancing'
        ];

        foreach ($blueprints as $title => $tagName)
        {
            $blueprint = Blueprint::where('title', 'like', $title)->first();

            $tag = Tag::where('name', 'LIKE', $tagName)->first();

            $blueprint->tags()->save($tag);
        }
    }
}
