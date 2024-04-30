<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('menu');
                    break;
            }
        }

        return view('login.auth');
    }

    public function cekLogin(LoginRequest $request)
    {
        $credential =  $request->only('email', 'password');
        //dd($credential);
        $request->session()->regenerate();
        if (Auth::attempt($credential)) {
            $user =  Auth::user();
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;
                case '2';
                    return redirect()->intended('transaksi');
                    break;
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'notfound' => 'Email or password is wrong'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreUserRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(User $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatePenggunaRequest $request, User $pengguna)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Pengguna $pengguna)
    // {
    //     //
    // }
}
