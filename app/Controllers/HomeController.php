<?php

namespace App\Controllers;

use Source\Request;

class HomeController
{
    public function home(Request $request)
    {
        return view('home');
    }
}