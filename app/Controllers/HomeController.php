<?php

namespace App\Controllers;

use Source\Request\Request;

class HomeController implements Controller
{
    public function home(Request $request)
    {
        return view('home');
    }
}