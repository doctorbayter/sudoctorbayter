<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        return view('plan.index');
    }

    public function repice()
    {
        return view('plan.repice');
    }

    public function bebidas()
    {
        return view('plan.bebidas');
    }

    public function salsas()
    {
        return view('plan.salsas');
    }

    public function snacks()
    {
        return view('plan.snacks');
    }
}
