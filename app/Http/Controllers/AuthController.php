<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'Registrado');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email ou senha inválidos');
        }

        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
        ]);

        return redirect()->route('perfil');
    }

    public function logout()
    {
        session()->forget(['user_id', 'user_name']);
        return redirect()->route('/');
    }
}
