<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        // You can pass any required data to the view here.
        return view('admin.dashboard');
    }
}
