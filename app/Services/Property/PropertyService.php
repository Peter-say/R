<?php

namespace App\Services\Property;
use App\Models\Property;
use App\Models\PropertyAddress;
use App\Models\PropertySpecification;
use Illuminate\Http\Request;
use App\Services\FileServices;
use Illuminate\Support\Str;


class PropertyService
{
    protected $fileService;

    public function __construct() {
        $this->fileService = new FileServices();
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'address_id' => 'nullable|exists:property_addresses,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'images.*' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'property_video' => 'video|nullable|string',
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
            'status' => 'nullable',
            'is_featured' => 'nullable|string',
            'is_trending' => 'nullable|string',
        ]);
    }



    public function storeProperty(Request $request)
    {

        
        // Validate the incoming data
        $this->validateData($request);

        // Process images and store paths in $imagePaths
        $imagePaths = [];
        $imagePaths = $this->fileService->storeImages($request);


        $floorPlanImagePaths = [];
        $floorPlanImagePaths = $this->fileService->storeFloorPlanImages($request);
        
        $propertyVideoPath = $this->fileService->storeFloorPropertyVideo($request);

        // Create PropertyAddress record
        $address = PropertyAddress::create([
            'street_address' => $request->input('street_address'),
            'state' => $request->input('state'),
            'area' => $request->input('area'),
            'city' => $request->input('city'),
            'zip' => $request->input('zip'),
            'country' => $request->input('country'),
        ]);


        // Create a new property using the validated data
        $property = Property::create([

            'category_id' => $request->input('category_id'),
            'user_id' => $request->input('user_id'),
            'uuid' => $this->generateUUID(),
            'address_id' => $address->id,
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'images' => json_encode($imagePaths),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'property_video' =>  $propertyVideoPath,
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'bedrooms' => $request->input('bedrooms'),
            'bathrooms' => $request->input('bathrooms'),
            'year_built' => $request->input('year_built'),
            'garage' => $request->input('garage'),
            'garage_size' => $request->input('garage_size'),
            'floor_plan_description' => $request->input('floor_plan_description'),
            'floor_plan_images' => json_encode($floorPlanImagePaths),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'stock_status' => $request->input('stock_status'),
            'is_featured' => $request->input('is_featured', 'No'),
            'is_trending' => $request->input('is_trending', 'No'),
            'status' => $request->input('status', 'Active'), // Default value if not provided
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
        $this->validateData($request);

        // Retrieve the property
        $property = Property::findOrFail($id);

        // Update the property address
        $address = PropertyAddress::updateOrCreate([
            'street_address' => $request->input('street_address'),
            'state' => $request->input('state'),
            'area' => $request->input('area'),
            'city' => $request->input('city'),
            'zip' => $request->input('zip'),
            'country' => $request->input('country'),
        ]);

        // Process images and store paths in $imagePaths
        // $imagePaths = [];
       
        $imagePaths = $this->fileService->updateImages($request, $property);
        $floorPlanImagePaths = [];
        $floorPlanImagePaths = $this->fileService->updateFloorPlanImages($request, $property);

        $propertyVideoPath  = $this->fileService->updateFloorPropertyVideo($request, $property);

        // Update the property details
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
            'property_video' =>  $propertyVideoPath,
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'bedrooms' => $request->input('bedrooms'),
            'bathrooms' => $request->input('bathrooms'),
            'year_built' => $request->input('year_built'),
            'garage' => $request->input('garage'),
            'garage_size' => $request->input('garage_size'),
            'floor_plan_description' => $request->input('floor_plan_description'),
            'floor_plan_images' => json_encode($floorPlanImagePaths),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'stock_status' => $request->input('stock_status'),
            'is_featured' => $request->input('is_featured', 'No'),
            'is_trending' => $request->input('is_trending', 'No'),
            'status' => $request->input('status', 'Active'),
        ]);

        // Delete existing property specifications
        $property->specifications()->delete();

        // Create new property specifications
        foreach ($request->input('feature') as $feature) {
            PropertySpecification::create([
                'property_id' => $property->id,
                'feature' => $feature,
            ]);
        }

        // Redirect the property
        return $property;
    }


    private function generateUUID()
    {
        $uuid = Str::uuid();
        $shortUUID = str_replace('-', '', $uuid->toString());
        return substr($shortUUID, 0, 12);
    }
}
