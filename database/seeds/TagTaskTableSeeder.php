<?php

use Illuminate\Database\Seeder;
use App\UserTask;
use App\Tag;

class TagTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tasks =[
            'Call home' => ['leisure'],
            'Feed the dog' => ['house', 'urgent'],
        ];

        # Now loop through the above array, creating a new pivot for each task to tag
        foreach ($tasks as $user_task => $tags) {

            # Get the task
            $task = UserTask::where('user_task', 'like', $user_task)->first();

            # Now loop through each tag for this task, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();

                # Connect this tag to this task
                $task->tags()->save($tag);
            }
        }
    }
}
