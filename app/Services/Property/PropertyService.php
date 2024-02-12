<?php

namespace App\Services\Property;

use App\Helpers\FileHelpers;
use App\Models\Property;
use App\Models\PropertyAddress;
use App\Models\PropertySpecification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyService
{

    private function validateData(Request $request, $id)
    {
        return $request->validate([
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'address_id' => 'nullable|exists:property_addresses,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'images.*' => 'nullable|json',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'property_video' => 'nullable|string',
            'size' => 'required|string',
            'type' => 'required|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'year_built' => 'required|string',
            'garage' => 'required|integer|min:0',
            'garage_size' => 'required|integer|min:0',
            'floor_plan_description' => 'nullable|string',
            'floor_plan_images' => 'nullable|json',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'stock_status' => 'required|string',
            'status' => 'string',
            'is_featured' => 'string', // assuming 'is_featured' should be one of these values
            'is_trending' => 'string', // assuming 'is_trending' should be one of these values
        ]);
    }



    public function storeProperty(Request $request, $id)
    {

        // Validate the incoming data
        $this->validateData($request, $id);

        // Process images and store paths in $imagePaths
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = FileHelpers::saveImageRequest($image, 'property/images');
            }
        }

         // Create PropertyAddress record
         $address = PropertyAddress::create([
            'street_address' => $request->input('street_address'),
            'state' => $request->input('county'),
            'area' => $request->input('area'),
            'city' => $request->input('city'),
            'zip' => $request->input('zip'),
            'country' => $request->input('country'),
        ]);


        // Create a new property using the validated data
        $property = Property::create([
           
            'category_id' => $request->input('category_id'),
            'user_id' => $request->input('user_id'),
            'address_id' => $address->id,
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'images' => json_encode($imagePaths),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'property_video' => $request->input('property_video'),
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'bedrooms' => $request->input('bedrooms'),
            'bathrooms' => $request->input('bathrooms'),
            'year_built' => $request->input('year_built'),
            'garage' => $request->input('garage'),
            'garage_size' => $request->input('garage_size'),
            'floor_plan_description' => $request->input('floor_plan_description'),
            'floor_plan_images' => json_encode($request->input('floor_plan_images')),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'stock_status' => $request->input('stock_status'),
            'status' => $request->input('status', 'active'), // Default value if not provided
        ]);

        foreach ($request->input('feature') as $feature) {
            PropertySpecification::create([
                'property_id' => $property->id,
                'feature' => $feature,
            ]);
        }

        // Redirect the property
        return $property;
    }


    public function updateProperty(Request $request, $id)
    {

        // Validate the incoming data
        $this->validateData($request, $id);

       
        // Process images and store paths in $imagePaths
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = FileHelpers::saveImageRequest($image, 'property/images');
            }
        }

        $property = Property::FindOrFail($id);

         // Create PropertyAddress record
         $address = PropertyAddress::updateOrcreate([
            'street_address' => $request->input('street_address'),
            'state' => $request->input('state'),
            'area' => $request->input('area'),
            'city' => $request->input('city'),
            'zip' => $request->input('zip'),
            'country' => $request->input('country'),
        ]);


        $property->update([
            'uuid' => $request->input('uuid'),
            'category_id' => $request->input('category_id'),
            'user_id' => $request->input('user_id'),
            'address_id' => $address->id,
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'images' => json_encode($imagePaths),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'property_video' => $request->input('property_video'),
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'bedrooms' => $request->input('bedrooms'),
            'bathrooms' => $request->input('bathrooms'),
            'year_built' => $request->input('year_built'),
            'garage' => $request->input('garage'),
            'garage_size' => $request->input('garage_size'),
            'floor_plan_description' => $request->input('floor_plan_description'),
            'floor_plan_images' => json_encode($request->input('floor_plan_images')),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'stock_status' => $request->input('stock_status'),
            'status' => $request->input('status', 'Active'), // Default value if not provided
        ]);

        $property->specifications()->delete(); // Delete existing specifications
        foreach ($request->input('feature') as $feature) {
            PropertySpecification::create([
                'property_id' => $property->id,
                'feature' => $feature,
            ]);
        }
        // Redirect the property
        return $property;
    }
}
