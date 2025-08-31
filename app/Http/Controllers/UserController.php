<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function RegisterForm() {
        return view('auth.register');
    }

    public function Register(Request $request){
        try {
            $field = $request->validate([
                'nama_guru' => 'required|unique:users,nama_guru',
                'NIP' => 'required|unique:users,NIP',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::create($field);
            // return response()->json([
            //     'message' => 'created successfully',
            //     'data' => $user
            // ]);

            return redirect()->route('register.form')->with('success', 'registrasi berhasil!');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function Login(Request $request){
        try {
            $request->validate([
                'email' => 'required|exists:users,email',
                'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'User atau password salah'
                ]);
            }
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'berhasil login',
                'token' => $token
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function Logout(Request $request){
        try {
            $user = $request->user();
            $user->CurrentAccessToken()->delete();
            return response()->json([
                'message' => 'berhasil logout'
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
