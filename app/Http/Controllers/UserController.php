<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;

use Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    use RegistersUsers;

    public function create(Request $request)
    {
        $data = $request->all();

        $params = [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'type' => 'required'
        ];

        $validator = Validator::make($data, $params);

        if($validator->fails()) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()->all()
            ], 422);
        }

        $data['password'] = bcrypt($data['password']);

        return User::create($data);
    }
}
