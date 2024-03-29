<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminTablesSeeder::class,
            UsersTableSeeder::class,
            DeptsTableSeeder::class,
            SeetsTableSeeder::class,
            SitdownsTableSeeder::class,
            EmployeesTableSeeder::class,
            CreateDemoUser::class,
        ]);
    }
}
