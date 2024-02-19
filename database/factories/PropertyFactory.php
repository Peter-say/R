<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PropertyAddress;
use App\Models\PropertySpecification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        $imageDirectory = public_path('web/images/property/grid/');
        $images = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        
        $floorPlanDirectory = public_path('web/images/property/floor-plans-01.jpeg');
        $floorPlanImages = $floorPlanDirectory;
        
        $youtubeUrl = 'https://www.youtube.com/embed/kacyaEXqVhs';
        $propertyVideoId = Str::afterLast($youtubeUrl, '/');
        
        shuffle($images);
        
        // Pick the first 5 images from the shuffled array
        $randomImages = array_slice($images, 0, 2);
        
        $savedImages = [];
        
        foreach ($randomImages as $image) {
            $basename = basename($image);
            $destinationPath = 'property/images/' . $basename;
        
            // Check if the file already exists in storage
            if (Storage::disk('public')->exists($destinationPath)) {
                // If it exists, delete it
                Storage::disk('public')->delete($destinationPath);
            }
        
            // Store the image in the storage directory
            Storage::disk('public')->put($destinationPath, file_get_contents($image));
        
            // Save the basename to the array
            $savedImages[] = $basename;
        }
        
        // Convert the array of saved image basenames to a JSON string
        $serializedImagePaths = json_encode($savedImages);

        $faker = \Faker\Factory::create();

        return [
            'category_id' => mt_rand(1, 2),
            'uuid' => $faker->uuid(12),
            'user_id' => mt_rand(1, 10),
            'name' => $name = $this->faker->sentence($nbWords = rand(10, 15), $variableNbWords = true),
            'slug' => Str::slug($name),
            'images' => $serializedImagePaths,
            'property_video' => "https://www.youtube.com/embed/$propertyVideoId",
            'price' => $faker->randomFloat(2, 1000, 500000),
            'description' => $faker->paragraph,
            'size' => $faker->numberBetween(500, 5000),
            'type' => $faker->randomElement(['Full Family Home', 'Campus', '2 Bedroom Apartment', 'Self-Contained']),
            'bedrooms' => $faker->numberBetween(1, 5),
            'bathrooms' => $faker->numberBetween(1, 3),
            'year_built' => $faker->date,
            'garage' => $faker->numberBetween(0, 1),
            'garage_size' => $faker->numberBetween(1, 3),
            'address_id' => mt_rand(1, 15),
            'floor_plan_description' => $faker->sentence(2),
            'floor_plan_images' => json_encode($floorPlanImages),
            'meta_description' => $faker->sentence,
            'meta_keyword' => $faker->word,
            'stock_status' => $faker->randomElement(['Rent', 'Sell']),
            'status' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Property $property) {
            $property_specifications = [
                ['feature' => 'Air Conditioning'],
                ['feature' => 'Laundry'],
                ['feature' => 'Barbeque'],
                ['feature' => 'Gym'],
                ['feature' => 'Refrigerator'],
                ['feature' => 'Swimming Pool'],
                ['feature' => 'WiFi'],
            ];
    
            foreach ($property_specifications as $spec) {
                $property->specifications()->create([
                    'feature' => $spec['feature'],
                ]);
            }
        });
    }
    
}
