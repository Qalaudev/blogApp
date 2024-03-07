<?php

namespace App\Http\Controllers\Auth2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
//        if(Auth::check()){
//            return redirect()->intended('/admin/users');
//        }

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if(Auth::attempt($validated)){
            if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'moderator')
                return redirect()->intended('/management/users');
            return redirect()->intended('/posts');
        }

        return back()->withErrors('errors','Incorrect email or password');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('posts.index');
    }

}
