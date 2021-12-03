<?php

namespace App\Controllers;

class DashboardController implements Controller
{
    public function login()
    {
        return view('dashboard/login');
    }
}