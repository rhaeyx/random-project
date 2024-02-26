<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [AdminSeeder::class];

        if (config('app.env') != 'production') {
            $seeders[] = UserSeeder::class;
        }

        $this->call($seeders);
    }
}
