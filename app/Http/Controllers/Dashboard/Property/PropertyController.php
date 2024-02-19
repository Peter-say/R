<?php

namespace App\Http\Controllers\Dashboard\Property;

use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use App\Services\Property\PropertyService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::paginate('50');
        return view('dashboard.property.list', [
            'properties' => $properties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::get();
        $boolOptions = StatusConstants::BOOL_OPTIONS;
        $statusOptions = StatusConstants::ACTIVE_OPTIONS;
        $stockOptions = StatusConstants::STOCK_OPTIONS;
        return view('dashboard.property.create', [
            'boolOptions' => $boolOptions,
            'statusOptions' => $statusOptions,
            'stockOptions' => $stockOptions,
            'categories' => $categories,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            (new PropertyService)->storeProperty($request);
            return redirect()->route('dashboard.property.index')->with('success_message', 'Property created successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related exception
            return back()->with('error_message', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error_message', 'Something went wrong while trying to create the Property' . $e->getMessage());
        }
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
        $categories = Category::get();
        $boolOptions = StatusConstants::BOOL_OPTIONS;
        $statusOptions = StatusConstants::ACTIVE_OPTIONS;
        $stockOptions = StatusConstants::STOCK_OPTIONS;
        $property = Property::where('id',$id)->first();
        return view('dashboard.property.edit', [
            'property' => $property,
            'boolOptions' => $boolOptions,
            'statusOptions' => $statusOptions,
            'stockOptions' => $stockOptions,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        try {
            (new PropertyService)->updateProperty($request, $id);
            // dd($request->all(), $id);
            return redirect()->route('dashboard.property.index')->with('success_message', 'Propery updated successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related exceptionp
            return back()->with('error_message', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', 'Something went wrong while trying to updating the Propery' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::withTrashed()->findOrFail($id);
        dd($property);
        $property->specifications()->delete();
        if ($property) {
            $property->forceDelete();
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
