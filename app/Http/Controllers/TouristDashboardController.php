<?php

namespace App\Http\Controllers;

class TouristDashboardController extends Controller
{
    public function index()
    {
        return view('tourist.dashboard');
    }
}