<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::whereIn('id', [1,2,10,4])->get();
        return  view('welcome', compact('recipes'));
    }
    public function doctor()
    {
        return  view('doctor');
    }
    public function dkp()
    {
        $plan_premium = Plan::find(1);
        $plan_fase_uno = Plan::find(2);
        return  view('dkp', compact('plan_premium','plan_fase_uno'));
    }

    public function dkpOferta(Request $request) {

        $time = Carbon::now()->addDays(5)->format('Y/m/d H:i:s');
        $plan_oferta = Plan::find(8);
        $cookie = Cookie::get('promoAdReto4');

        if ($cookie != null) {
            $promo_time['date'] = $cookie;
            return view('dkp-oferta', compact('plan_oferta', 'promo_time'));
        }else{
            $promo_time['date']  = $time;
            $response = new HttpResponse(view('dkp-oferta', compact('plan_oferta', 'promo_time')));
            $response->withCookie(cookie()->forever('promoAdReto4', $time)); // this will last five years
            return $response;
        }
    }

    public function dkpTiktok(Request $request)
    {
        $plan_oferta = Plan::find(8);
        return view('dkp-tiktok', compact('plan_oferta'));
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
        $planesWhatsapp = Plan::whereIn('id', [5,6])->get();
        return  view('cita', compact('planesWhatsapp'));
    }
}
