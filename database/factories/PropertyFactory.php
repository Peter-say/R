<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageDirectory = public_path('web/imges/property/grid/');
        $images = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        $floorPlanDirectory = public_path('web/imges/property/floor-plans');
        $floorPlanImages = glob($floorPlanDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        $youtubeUrl = 'https://www.youtube.com/embed/kacyaEXqVhs';
        $propertyVideoId = Str::afterLast($youtubeUrl, '/');

        shuffle($images);

        // Pick the first 5 images from the shuffled array
        $randomImages = array_slice($images, 0, 2);

        // Destination directory
        $destinationPath = public_path('property/images/');

        // Create the destination directory if it doesn't exist
        File::ensureDirectoryExists($destinationPath);

        $savedImages = [];

        foreach ($randomImages as $image) {
            $basename = basename($image);
            $destination = $destinationPath . $basename;

            // Check if the file already exists
            if (File::exists($destination)) {
                // If it exists, unlink (delete) it
                File::delete($destination);
            }

            // Copy the image to the destination directory
            File::copy($image, $destination);

            // Save the basename to the array
            $savedImages[] = $basename;
        }
        $faker = \Faker\Factory::create();
        return [
            'category_id' => mt_rand(1, 2),

            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'name' =>  $name = $this->faker->sentence($nbWords = rand(10, 15), $variableNbWords = true),
            'slug' => Str::slug($name),
            'images' => json_encode($savedImages),
            'property_video' => "https://www.youtube.com/embed/$propertyVideoId",
            'features' => json_encode($faker->words(5)),
            'price' => $faker->randomFloat(2, 1000, 500000),
            'description' => $faker->paragraph,
            'size' => $faker->numberBetween(500, 5000),
            'type' => $faker->randomElement(['Full Family Home', 'Campus', '2 Bedroom Apartment', 'Self-Contained']),
            'bedrooms' => $faker->numberBetween(1, 5),
            'bathrooms' => $faker->numberBetween(1, 3),
            'year_built' => $faker->date,
            'garage' => $faker->numberBetween(0, 1),
            'garage_size' => $faker->numberBetween(1, 3),
            'floor_plan_description' =>$faker->sentence(2),
            'floor_plan_images' => json_encode( $floorPlanImages),
            'meta_description' => $faker->sentence,
            'meta_keyword' => $faker->word,
            'stock_status' => $faker->randomElement(['in_stock', 'out_of_stock']),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
