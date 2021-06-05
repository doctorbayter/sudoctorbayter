<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::whereIn('id', [1,2,3,4])->get();
        return  view('welcome', compact('recipes'));
    }
    public function doctor()
    {
        return  view('doctor');
    }
    public function dkp()
    {
        return  view('dkp');
    }
    public function programas()
    {
        return  view('programas');
    }
    public function blog()
    {
        return  view('blog');
    }
    public function blog_uno()
    {
        return  view('blog.uno');
    }
    public function blog_dos()
    {
        return  view('blog.dos');
    }
    public function blog_tres()
    {
        return  view('blog.tres');
    }
    public function recursos()
    {
        return  view('recursos');
    }
    public function cita()
    {
        return  view('cita');
    }
}
