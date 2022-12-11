<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function checkUser(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $validator = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ],[
            'email.required'    => 'Email tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
            'email.email'       => 'Format Email tidak valid',
        ]);


        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Email atau Password salah.');
        }
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    public function createUser(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        DB::beginTransaction();
        try {
            $user = User::create([
                'username' => $request->username,
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
            return redirect()->route('login.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
