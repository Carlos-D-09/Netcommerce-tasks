<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'name' => 'Perform technical test',
                'description' => 'Understand the requirements for the test and program the solution',
                'user_id' => 2,
                'company_id' => 1
            ],[
                'name' => 'Check technical test',
                'description' => 'Check and rate the technical test',
                'user_id' => 2,
                'company_id' => 1
            ]
        ]);
    }
}
