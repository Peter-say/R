<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::paginate(30);
        $agent = $users->where('role', 'agent');
        return view('dashboard.users.index', [
            'users' => $users,
            'agent' => $agent,
        ]);
    }

    public function delete($id)
    {
      $user = User::where('id', $id)->first();
      dd($user->id);
      $user->delete();
      return back()->with('success_message', 'User Deleted Successfully');
    }
}
