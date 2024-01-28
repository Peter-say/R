<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $latestProperties = Property::with('agent')->where('status', 'active')->latest()->take(6)->get();

        return view('web.index', [
            'categories' => $categories,
            'latestProperties' => $latestProperties,
        ]);
    }

    public function about()
    {
        return view('web.about');
    }

    public function contact()
    {
        return view('web.contact');
    }
}
