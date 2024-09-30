<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Use the content on seeder files
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            TaskSeeder::class
        ]);

        //Use the factories
        $companies = Company::factory()->count(4)->create();
        $users = User::factory()->count(3)->has(
            Task::factory()->count(5)->state(function(array $attributes) use ($companies){
                return [
                    'company_id' => $companies->random()->id
                ];
            })
        )->create();
    }
}
