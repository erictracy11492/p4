<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['work', 'school', 'house', 'leisure', 'less priority', 'urgent'];

        foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }

}