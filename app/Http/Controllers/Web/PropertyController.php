<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function listing()
    {
        return view('web.property.listing');
    }

    public function details()
    {
        return view('web.property.details');
    }
}
