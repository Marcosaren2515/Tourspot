<?php

namespace App\Http\Controllers;

class OperatorDashboardController extends Controller
{
    public function index()
    {
        return view('operator.dashboard');
    }
}