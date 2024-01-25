<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('web.blog.index');
    }

    public function details()
    {
        return view('web.blog.details');
    }
}
