<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
           'name' => 'required|max:255|string',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|max:255|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::where('name' , 'user')->first()->id,
        ]);

        Auth::login($user);

        return redirect()->route('posts.index');

    }

}
