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

    const SAMPLE_USER_EMAILS = [
        'pet-owner@example.com', 'pet-adopter@example.com', 'pet-collector@example.com',
    ];

    public function run(): void
    {
        foreach (self::SAMPLE_USER_EMAILS as $userEmail) {
            //Get the user if already exists
            $user = User::query()->firstWhere('email', $userEmail);
            //If not, create with UserFactory
            if (!$user) {
                $user = User::factory()->create([
                    'name' => 'Test User',
                    'email' => $userEmail,
                    'password' => Hash::make('petFarm')
                ]);
            }
            //Create pets for the user
            Pet::factory()->count(15)->for($user)->create();
        }
    }
}
