<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return response()->json([
            'data' => [
                'users' => $users
            ]
        ], 200);
    }
    public function update($id, Request $request)
    {
        return response()->json(['data' => [
            'msg' => 'User updated'
        ]], 201);
    }
    public function delete($id, Request $request)
    {
        return response()->json(['data' => [
            'msg' => 'User deleted'
        ]], 201);
    }
}
