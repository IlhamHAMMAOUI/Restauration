<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use App\Models\Cuisine;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuisine>
 */
class CuisineFactory extends Factory
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
            'imagess/image1.png',
            'imagess/image2.png',
            'imagess/image3.png',
            'imagess/image4.png',
            'imagess/image5.png'
        ];

        // Get the image based on the index and increment the index
        $imagePath = $imagePaths[$imageIndex % count($imagePaths)];
        $imageIndex++;

        // Check if the file exists in the storage
        if (!Storage::disk('public')->exists($imagePath)) {
            throw new \Exception("Image file '$imagePath' not found.");
        }

        return [
            'description' => $this->faker->paragraph,
            'specialties' => $this->faker->sentence(5),
            'ingredients' => $this->faker->sentence(10),
            'techniques' => $this->faker->sentence(5),
            // 'image' => $imagePath,
            'image1' => $imagePath,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null,
        ];
    }
}
