<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Define the list of images
        static $imageIndex = 0;
        $imagePaths = [
            'imagessss/image1.png',
            'imagessss/image2.png',
            'imagessss/image3.png',
            'imagessss/image4.png',
            'imagessss/image5.png'
        ];

        // Get the image based on the index and increment the index
        $imagePath = $imagePaths[$imageIndex % count($imagePaths)];
        $imageIndex++;

        // Check if the file exists in the storage
        if (!Storage::disk('public')->exists($imagePath)) {
            throw new \Exception("Image file '$imagePath' not found.");
        }


        return [
            'image1' => $imagePath,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null,
        ];
    }
 
}
