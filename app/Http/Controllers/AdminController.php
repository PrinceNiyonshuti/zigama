<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $attributes = array(
            'name' => 'required|unique:admins,name',
            'phone' => 'required|numeric|unique:admins,phone',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:7|max:255'
        );

        $validator = Validator::make($request->all(), $attributes);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $account = new Admin;
            $account->name = $request->name;
            $account->phone = $request->phone;
            $account->email = $request->email;
            $account->password = bcrypt($request->password);
            $newAccount = $account->save();

            if ($newAccount) {
                $token = $account->createToken('my-app-token')->plainTextToken;
                $response = [
                    'message' => 'New Admin Account created',
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

    public function login(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 401);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
