<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function listing()
    {
        $properties = Property::where('status', 'active')->latest()->take(6)->get();
        return view('web.property.listing', [
           'properties' => $properties,
        ]);
    }

    public function details($id)
    {
        $property = Property::findOrFail($id);
        return view('web.property.details', [
            'property' => $property,
        ]);
    }
}
