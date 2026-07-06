<?php

namespace App\Controllers\Notaris;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('notaris/dashboard');
    }
}