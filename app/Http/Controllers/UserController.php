<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $attributes = array(
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7|max:255'
        );

        $validator = Validator::make($request->all(), $attributes);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $account = new User;
            $account->reference = str::random(10);
            $account->name = $request->name;
            $account->email = $request->email;
            $account->password = bcrypt($request->password);
            $newAccount = $account->save();

            if ($newAccount) {
                $token = $account->createToken('my-app-token')->plainTextToken;
                $response = [
                    'message' => 'New Account created',
                    'user' => $account,
                    'token' => $token
                ];
                return response($response, 201);
            } else {
                return response([
                    'message' => ['Something went wrong  !']
                ], 404);
            }
        }
    }

    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
}
