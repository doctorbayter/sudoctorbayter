<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageVariationController extends Controller
{


    public function show(Request $request)
    {
        //$request->session()->forget('page_variation');

        // Mapeo directo no es necesario para 'C' ya que es un caso especial
        // Se verificará primero si el parámetro es 'c' y luego se procederá con el resto

        $linkVersion = strtolower($request->input('version', ''));

        if ($linkVersion === 'c') {
            $variation = 'C'; // Variación Optimizada para Tráfico Frío

        } elseif (!$request->session()->has('page_variation')) {
            // Si no hay una variación en la sesión, se decide entre 'A' y 'B'
            $variations = ['A'];
            $variation = $variations[array_rand($variations)]; // Selecciona una variación al azar
            $request->session()->put('page_variation', $variation);

        } else {
            // Usa la variación almacenada en la sesión si ya existe una
            $variation = $request->session()->get('page_variation');
        }

        // Asegúrate de actualizar la sesión si el usuario selecciona explícitamente 'C'
        if ($linkVersion === 'c' && $request->session()->get('page_variation') !== 'C') {
            $request->session()->put('page_variation', $variation);
        }


        // Devuelve la vista correspondiente a la variación
        return view('dkp-7-dias-' . strtolower($variation), compact('variation'));
    }
}