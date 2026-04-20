<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // login auto
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Account created!');
    }

     
      public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    
    $user = User::where('email', $request->email)->first();

   
    if (!$user || !password_verify($request->password, $user->password)) {
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput();
    }

    
    session(['user' => $user]);

    return redirect()->route('home');
}

    public function logout(Request $request)
    {
        session()->forget('user'); // clear session
        return redirect()->route('login');
    }
}
