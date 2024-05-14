<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function plan()
    {
        return view('plan');
    }

    public function calendar()
    {
        return view('calendar');
    }
    public function academic()
    {
        return view('academic');
    }

    public function message()
    {
        return view('message');
    }

    public function settings()
    {
        return view('settings');
    }

}
