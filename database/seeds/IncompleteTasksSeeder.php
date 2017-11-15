<?php

use Illuminate\Database\Seeder;
use App\IncompleteTasks;

class IncompleteTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
        ['Do the laundry'],
        ['Clean the bathroom'],
    ];
        
        $count = count($tasks);
        
        foreach ($tasks as $key => $task) {
        IncompleteTasks::insert([
            'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'incomplete_task' => $task[0]
        ]);
        $count--;
    }
    }
}
