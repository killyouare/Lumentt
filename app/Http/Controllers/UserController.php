<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function show(Request $request)
    {
        return ['success' => true];
    }
}
