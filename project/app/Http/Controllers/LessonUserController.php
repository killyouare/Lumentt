<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LessonUserController extends Controller
{

    public function update($id)
    {

        return response()->json(['data' => [
            'msg' => 'User updated'
        ]], 201);
    }

}
