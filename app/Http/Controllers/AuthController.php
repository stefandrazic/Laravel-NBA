<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Str;

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
        if (!auth()->user()->email_verified_at) {
            FacadesSession::flush();
            Auth::logout();
            return redirect('/login')->withErrors('Email is not verified!');
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
        $user->verify_string = Str::uuid()->toString();
        $user->save();
        $mailData = $user->only('email', 'verify_string');
        Mail::to($user->email)->send(new VerifyEmail($mailData));


        return redirect('/login')->with('status', 'Successfully registred!');
    }

    public function verify(string $string)
    {
        $user = User::where('verify_string', $string)->first();
        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
            return redirect('/')->with('status', 'Email verified successfully!');
        }
        return redirect('/')->withErrors('Invalid verify request!');
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
