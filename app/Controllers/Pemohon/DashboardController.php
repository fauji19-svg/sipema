<?php

namespace App\Controllers\Pemohon;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('pemohon/dashboard');
    }
}