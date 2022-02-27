<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $random = [];
        $user_id = User::where('id', 1)->first();
        return [$user_id];
    }
}
