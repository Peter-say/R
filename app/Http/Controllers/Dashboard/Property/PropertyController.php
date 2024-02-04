<?php

namespace App\Http\Controllers\Dashboard\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Exception;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::latest()->paginate('50');
        return view('dashboard.property.list', [
            'properties' => $properties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::find($id);

        if ($property) {
            $property->delete();
            return back()->with('success_message', 'Property deleted successfully');
        } else {
            return back()->with('error_message', 'Property not found');
        }
    }

    public function updateFeatured(Request $request, $id)
    {
        try {
            $property = Property::findOrFail($id);
            $property->update(['is_featured' => $request->input('is_featured')]);
            session()->flash('success_message', 'Property featured updated');
        } catch (Exception $e) {
            session()->flash('error_message', 'Can not update' . $e->getMessage());
        }
        return redirect()->back();
    }
}
