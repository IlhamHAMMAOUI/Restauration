<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Génère une phrase de 3 mots aléatoires
            'description' => $this->faker->paragraph, // Génère un paragraphe aléatoire
            'email' => $this->faker->email,
            'address' => $this->faker->address, // Génère une adresse aléatoire
            'phone' => $this->faker->phoneNumber, // Génère un numéro de téléphone aléatoire
            'managing_partner' => $this->faker->name, // Génère un nom aléatoire
            'chef_partner' => $this->faker->name, // Génère un nom aléatoire
            'general_manager' => $this->faker->name, // Génère un nom aléatoire
            'executive_chef' => $this->faker->name, // Génère un nom aléatoire
            'chef_de_cuisine' => $this->faker->name, // Génère un nom aléatoire
            'office_manager' => $this->faker->name, // Génère un nom aléatoire
            'sous_chefs' => $this->faker->name, // Génère un nom aléatoire
            'pastry' => $this->faker->name, // Génère un nom aléatoire
            'managers' => $this->faker->name . ', ' . $this->faker->name . ', ' . $this->faker->name . ', ' . $this->faker->name, // Génère plusieurs noms aléatoires
            'wine_buyer' => $this->faker->name, // Génère un nom aléatoire
            'event_manager' => $this->faker->name // Génère un nom aléatoire
        ];
    }
}
