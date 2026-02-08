<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // Basic auth check
        if (! session()->get('user_id')) {
            return redirect()->to('/login');
        }

        return view('dashboard/index');
    }

    
}
