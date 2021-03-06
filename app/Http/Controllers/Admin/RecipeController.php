<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{

    public function __construct(){
        $this->middleware('can:Leer Recetas')->only('index');
        $this->middleware('can:Crear Recetas')->only('create', 'store');
        $this->middleware('can:Actualizar Recetas')->only('edit');
        $this->middleware('can:Eliminar Recetas')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.recipes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('admin.recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $types = [
            '1' => 'Receta',
            '2' => 'Snack',
            '3' => 'Bebida',
            '4' => 'Salsita',
        ];
        $indices = [
            '1' => 'Bajo',
            '2' => 'Medio',
            '3' => 'Alto',
        ];

        return view('admin.recipes.edit', compact('recipe','types','indices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:recipes,slug,'.$recipe->id,
            'type' => 'required',
            'carbs' => 'required',
            'indice' => 'required',
            'time' => 'required',
            'image' => 'image|dimensions:max_width=500,max_height=275,min_width=500,min_height=275'
        ]);

        $recipe->update($request->all());

        if($request->file('image')){

            $url = Storage::put('recipes', $request->file('image'));

            if($recipe->image){
                Storage::delete($recipe->image->url);
                $recipe->image->update([
                    'url'=> $url
                ]);
            }else{
                $recipe->image()->create([
                    'url'=> $url
                ]);
            }
        }
        return redirect()->route('admin.recipes.edit', $recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
