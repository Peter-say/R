<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function listing()
    {
        $recentProperties = Property::latest()->take(5)->get();
        $featuredProperty = Property::where('is_featured', 'Yes')->first();
        $agents = User::where('is_verified', 'Yes')->where('role' , 'agent')->get();
        return view('web.agent.listing', [
            'recentProperties' =>  $recentProperties,
            'agents' => $agents,
            'featuredProperty' => $featuredProperty,
        ]);
    }
}
