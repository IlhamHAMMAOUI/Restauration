<?php

namespace Database\Factories;

use App\Models\Private_dining;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Private_diningFactory extends Factory
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
            'images/image1.png',
            'images/image2.png',
            'images/image3.png',
            'images/image4.png',
            'images/image5.png'
        ];

        // Get the image based on the index and increment the index
        $imagePath = $imagePaths[$imageIndex % count($imagePaths)];
        $imageIndex++;

        // Check if the file exists in the storage
        if (!Storage::disk('public')->exists($imagePath)) {
            throw new \Exception("Image file '$imagePath' not found.");
        }

        return [
            'name' => $this->faker->unique()->word . ' Room',
            'description' => $this->faker->paragraph,
            'capacity' => $this->faker->numberBetween(10, 30),
            'details' => $this->faker->paragraphs(2, true),
            'contact_phone' => $this->faker->phoneNumber,
            'contact_email' => $this->faker->email,
            'image1' => $imagePath,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null,
        ];
    }

    /**
     * Configure the model associated with the factory.
     *
     * @var string
     */
    protected $model = Private_dining::class;
}
