<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(30);
        return view('dashboard.users.index', [
            'users' => $users
        ]);
    }
}
