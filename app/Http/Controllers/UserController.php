<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function RegisterForm()
    {
        return view('auth.register');
    }

    public function Register(Request $request)
    {
        try {
            $field = $request->validate([
                'nama_guru' => 'required|unique:users,nama_guru',
                'NIP' => 'required|unique:users,NIP',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::create($field);

            return redirect()->route('register.form')->with('success', 'registrasi berhasil!');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function LoginForm()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;
            $remember = $request->has('remember');

            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                $request->session()->regenerate();

                return redirect('/')->with('success', 'Selamat datang, ' . Auth::user()->nama_guru);
            }

            return back()->with('error', 'Email atau password salah!')->withInput($request->only('email'));
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function Logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->with('success', 'Logout berhasil!');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
