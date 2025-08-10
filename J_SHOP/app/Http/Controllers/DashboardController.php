<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //this will show dashboard page to customer
    public function index(){
        return view('dashboard');
    }
}
