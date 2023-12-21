<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLogin()
    {
        return view("pages.auth.login");
    }

    public function showRegister()
    {
        return view("pages.auth.register");
    }

    public function index(LoginRequest $request)
    {
        if (auth()->user()) {
            return redirect('/')->withErrors('You are already logged in!');
        }
        $credentials = $request->only('email', 'password');
        if (!auth()->attempt($credentials)) {
            return redirect('/login')->withErrors('Invadil credentials!');
        }
        return redirect('/teams')->with('status', 'Successfully logged in!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        if ($user->id === 1) {
            $user->isAdmin = true;
            $user->save();
        }


        return redirect('/login')->with('status', 'Successfully registred!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        FacadesSession::flush();
        Auth::logout();

        return redirect('/login')->with('status', 'Logged out!');
    }
}
