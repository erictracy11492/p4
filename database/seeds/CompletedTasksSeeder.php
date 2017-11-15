<?php

use Illuminate\Database\Seeder;
use App\CompletedTasks;

class CompletedTasksSeeder extends Seeder
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
        CompletedTasks::insert([
            'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'completed_task' => $task[0]
        ]);
        $count--;
    }
    }
}
