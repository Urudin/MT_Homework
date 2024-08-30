<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $species = $this->faker->randomElement(['dog', 'cat', 'bird', 'other']);
        $breeds = match($species){
            'dog' => ['golden retriever', 'cane corso', 'sausage dog', 'bulldog'],
            'cat' => ['persian', 'siamese', 'maine coon', 'british shorthair'],
            'bird' => ['parrot', 'canary', 'finch', 'cockatiel'],
            'other' => ['hamster', 'guinea pig', 'rabbit', 'ferret'],
        };
        return [
            'name' => $this->faker->randomElement(['Bella', 'Max', 'Daisy', 'Charlie', 'Luna', 'Rocky', 'Molly', 'Milo', 'Chloe', 'Bailey', 'Oliver', 'Ruby', 'Leo', 'Sadie', 'Jasper',]),
            'species' => $species,
            'breed' => $this->faker->randomElement($breeds),
            'age' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->randomElement(Pet::STATUSES),
            'description' => $this->faker->text(100),
        ];
    }
}
