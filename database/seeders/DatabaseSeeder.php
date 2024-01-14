<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\VaccineCenter;
use Illuminate\Database\Seeder;
use App\Models\UserVaccineRegistration;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ]);

        VaccineCenter::factory(10)->create();
        UserVaccineRegistration::factory(500)->create();
    }
}
