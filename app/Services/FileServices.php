<?php

namespace App\Services\Property;

use App\Helpers\FileHelpers;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileServices {

    public function storeImages(Request $request)
    {
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageDirectory = 'property/images';
                Storage::disk('public')->makeDirectory($imageDirectory);
                $imagePaths[] = FileHelpers::saveImageRequest($request->file('images'),  $imageDirectory);
            }
        }
    }

    public function storeFloorPlanImages(Request $request)
    {
        if ($request->hasFile('floor_plan_images')) {
            foreach ($request->file('floor_plan_images') as $image) {
                $imageDirectory = 'property/floor-plan/images';
                Storage::disk('public')->makeDirectory($imageDirectory);
                $floorPlanImagePaths[] = FileHelpers::saveImageRequest($request->file('floor_plan_images'),  $imageDirectory);
            }
        }
    }

    public function storeFloorPropertyVideo(Request $request)
    {
        if ($request->hasFile('property_video')) {
            $videoDirectory = 'property/video/';
            Storage::disk('public')->makeDirectory($videoDirectory);
            $propertyVideoPath = FileHelpers::saveImageRequest($request->file('property_video'), $videoDirectory);
        }
        return $propertyVideoPath;
    }

    // Updates files section

    public function updateImages(Request $request, Property $property)
    {
        if ($request->hasFile('images')) {
            // Save the paths of the new images
            foreach ($request->file('images') as $image) {
                $avatarDirectory = 'property/images';
                Storage::disk('public')->makeDirectory($avatarDirectory);
                $imagePaths[] = FileHelpers::saveImageRequest($request->file('avatar'), $avatarDirectory);
            }

            // Delete old images if new images are provided
            FileHelpers::deleteImages(json_decode($property->images, true));
        } else {
            // No new images provided, retain the existing ones
            $imagePaths = json_decode($property->images, true);
        }

        return $imagePaths;
    }

    public function updateFloorPlanImages(Request $request, Property $property)
    {
        if ($request->hasFile('floor_plan_images')) {
            foreach ($request->file('floor_plan_images') as $image) {
                $imageDirectory = 'property/floor-plan/images';
                Storage::disk('public')->makeDirectory($imageDirectory);
                $floorPlanImagePaths[] = FileHelpers::saveImageRequest($request->file('floor_plan_images'),  $imageDirectory);
            }
            // Delete old images if new images are provided
            FileHelpers::deleteImages(json_decode($property->floor_plan_images, true));
        } else {
            // No new images provided, retain the existing ones
            $floorPlanImagePaths = json_decode($property->floor_plan_images, true);
        }
    }

    public function updateFloorPropertyVideo(Request $request, Property $property)
    {
        
        if ($request->hasFile('property_video')) {
            $videoDirectory = 'property/video/';
            Storage::disk('public')->makeDirectory($videoDirectory);
            $propertyVideoPath = FileHelpers::saveImageRequest($request->file('property_video'), $videoDirectory);

            FileHelpers::deleteImages($property->property_video);
        } else {
            // No new images provided, retain the existing ones
            $floorPlanImagePaths = $property->property_video;
        }
    }
}