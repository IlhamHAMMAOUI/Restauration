<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

         // Define the list of images
         static $imageIndex = 0;
         $imagePaths = [
             'imagesss/image1.png',
             'imagesss/image2.png',
             'imagesss/image3.png',
             'imagesss/image4.png',
             'imagesss/image5.png'
         ];
 
         // Get the image based on the index and increment the index
         $imagePath = $imagePaths[$imageIndex % count($imagePaths)];
         $imageIndex++;
 
         // Check if the file exists in the storage
         if (!Storage::disk('public')->exists($imagePath)) {
             throw new \Exception("Image file '$imagePath' not found.");
         }

        // Exemple d'utilisation de noms de villes françaises
        $cities = ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg'];
        $city = $this->faker->randomElement($cities);

        return [
            'instructions' => $this->faker->text(100), // Limite à 200 caractères
            'phone_number' => $this->faker->phoneNumber('FR'), // Génère un numéro de téléphone aléatoire en France
            'online_reservation_link' => $this->faker->url, // Générateur aléatoire pour une URL
            'hours_of_operation' => $this->faker->sentence(2),
            'corkage_info' => '€' . $this->faker->numberBetween(50, 200) . ' par bouteille de 750 ml', // Utilisation de l'euro pour simuler un tarif de droit de bouchon
            'location_address' => $this->faker->randomElement($cities) . ', ' . $this->faker->address, // Utilisation d'une ville française aléatoire
            'directions' => $this->faker->text(100), // Limite à 300 caractères
            'image1' => $imagePath,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null,

        ];
    }

    /**
     * Configure le modèle associé au constructeur de la fabrique.
     *
     * @var string
     */
    protected $model = Reservation::class;
}
