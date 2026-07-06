<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('staff/dashboard');
    }
}