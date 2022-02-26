<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BankController extends Controller
{

    public function index()
    {
        $banks =  Bank::all();
        $response = [
            'banks' => $banks,
        ];
        return response($response, 201);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $attributes = array(
            "bankName" => "required|min:3|unique:banks,bankName",
            "email" => "required|email|unique:banks,email",
        );
        $validator = Validator::make($request->all(), $attributes);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $bank = new Bank();
            $bank->reference = str::random(10);
            $bank->bankName = $request->bankName;
            $bank->email = $request->email;
            $bank->password = bcrypt('password');
            $newBank = $bank->save();
            if ($newBank) {
                $response = [
                    'bank' => $bank,
                ];
                return response($response, 201);
            } else {
                return response([
                    'message' => ['Sorry , something went wrong']
                ], 404);
            }
        }
    }

    public function show(Bank $bank)
    {
        //
    }


    public function edit(Bank $bank)
    {
        //
    }


    public function update(Request $request, Bank $bank)
    {
        //
    }


    public function destroy(Bank $bank)
    {
        //
    }
}
