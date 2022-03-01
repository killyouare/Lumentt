<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // $users = User::all(['email', 'last_name', 'first_name', 'phone']);
        $users = User::all();

        return response()->json([
            'data' => [
                'users' => $users
            ]
        ], 200);
    }
    public function register(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        return response()->json(['data' => [
            'msg' => 'User created'
        ]], 201);
    }
    public function login(Request $request)
    {
        return response()->json(['data' => [
            'token' => 'zxczxczxczxcxzczx'
        ]], 201);
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
