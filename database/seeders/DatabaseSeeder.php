<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\Guest;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        Guest::create([
            'name' => 'John Doe',
            'table_number' => '12',
            'status' => 'pending',
        ]);

        Guest::create([
            'name' => 'Jane Smith',
            'table_number' => '12',
            'status' => 'attend',
        ]);

        Guest::create([
            'name' => 'Alice Johnson',
            'table_number' => 'A5',
            'status' => 'pending',
        ]);
    }
}
