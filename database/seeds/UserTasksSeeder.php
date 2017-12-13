<?php

use Illuminate\Database\Seeder;
use App\UserTask;

class UserTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
        ['Cook dinner'],
        ['Feed the dog'],
        ['Call home'],
        ];
        
        $count = count($tasks);
        
        foreach ($tasks as $key => $task) {
        UserTask::insert([
            'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'user_task' => $task[0]
        ]);
        $count--;
        }
    } 

}

