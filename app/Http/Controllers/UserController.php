<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Register(Request $request){
        try {
            $field = $request->validate([
                'nama_guru' => 'required',
                'NIP' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            $user = User::create($field);
            return response()->json([
                'message' => 'created successfully',
                'data' => $user
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
