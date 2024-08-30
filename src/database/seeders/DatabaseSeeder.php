<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::query()->firstWhere('email', 'pet-owner@example.com');

        if(!$user){
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'pet-owner@example.com',
                'password' => Hash::make('petFarm')
            ]);
        }

        Pet::factory()->count(15)->for($user)->create();
    }
}
