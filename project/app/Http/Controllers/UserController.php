<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return UserResource::collection(User::all());
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
            'phone' => [new PhoneNumber],
        ]);

        User::find($id)->update($request->except('password'));

        return response()->json(['data' => [
            'msg' => 'User updated'
        ]], 201);
    }
    public function delete($id)
    {

        User::destroy($id);

        return response()->json(['data' => [
            'msg' => 'User deleted'
        ]]);
    }
}
