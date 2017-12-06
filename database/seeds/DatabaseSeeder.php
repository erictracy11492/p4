<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTasksSeeder::class);
        //$this->call(IncompleteTasksSeeder::class);
        //$this->call(CompletedTasksSeeder::class);
    }
}
