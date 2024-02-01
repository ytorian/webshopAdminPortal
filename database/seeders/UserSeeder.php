<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'role' => 'Admin',
        ]);
        User::factory()->create([
            'email' => 'test@test2.com',
            'password' => Hash::make('test2'),
            'role' => 'Marketing'
        ]);
    }
}
