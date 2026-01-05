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
            ], [
                'nama_guru.unique' => 'Nama guru sudah terdaftar!',
                'NIP.unique' => 'NIP sudah terdaftar!',
                'email.unique' => 'Email sudah terdaftar!',
                'nama_guru.required' => 'Nama guru wajib diisi!',
                'NIP.required' => 'NIP wajib diisi!',
                'email.required' => 'Email wajib diisi!',
                'password.required' => 'Password wajib diisi!',
                'password.min' => 'Password minimal 6 karakter!'
            ]);

            $user = User::create($field);

            return redirect('/')->with('success', 'registrasi berhasil!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();
            $firstError = collect($errors)->flatten()->first();

            return redirect()->back()
                ->withInput()
                ->with('error', $firstError);
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
