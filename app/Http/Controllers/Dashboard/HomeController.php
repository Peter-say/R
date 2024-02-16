<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index()
   {
      $user = Auth::user();
      $all_users = User::all();
      $total_properties = Property::get();
      // Get the count of properties created in the last month
      $lastMonthPropertiesCount = Property::whereBetween(
         DB::raw('DATE(created_at)'),
         [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth()
         ]
      )->count();

      if ($user->role === 'Admin') {
         return view('dashboard.home', [
            'user' => $user,
            'total_properties' => $total_properties,
            'lastMonthPropertiesCount' => $lastMonthPropertiesCount,
            'all_users' => $all_users,
         ]);
      } elseif ($user->role === 'agent') {
         $property_count = $total_properties->where('user_id', $user->id);
         return view('dashboard.agent-dashboard', [
            'user' => $user,
            'property_count' => $property_count,
         ]);
      } else {

         return view('dashboard.user-dashboard', []);
      }
   }
}
