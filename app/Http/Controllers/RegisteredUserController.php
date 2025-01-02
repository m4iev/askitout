<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::min(6)]
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'reputation' => 0,
            'password' => $request->password,
            'remember_token' => Str::random(10)
        ]);

        Auth::login($user);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('profile.edit', [
            'user_name' => $user->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $attribute = $request->validate([
            'name' => ['required']
        ]);

        $user->update([
            'name' => $attribute['name']
        ]);

        return redirect("/profiles/{$user->id}/edit");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
