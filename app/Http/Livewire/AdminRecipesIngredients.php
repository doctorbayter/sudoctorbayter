<?php

namespace App\Http\Livewire;

use App\Models\Ingredient;
use App\Models\Recipe;
use Livewire\Component;

class AdminRecipesIngredients extends Component
{
    public $recipe, $ingredient, $ingredient_name;

    protected $rules = [
        'ingredient.name' => 'required'
    ];

    public function mount(Recipe $recipe){
        $this->recipe = $recipe;

        $this->ingredient = new Ingredient();

    }
    public function render(){
        return view('livewire.admin-recipes-ingredients')->layout('layouts.admin');
    }

    public function edit(Ingredient $ingredient) {
        $this->ingredient = $ingredient;
    }

    public function update() {

        $this->validate();

        $this->ingredient->save();
        $this->ingredient = new Ingredient();
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function store() {

        $this->validate([
            'ingredient_name' => 'required'
        ]);

        Ingredient::create([
            'name' => $this->ingredient_name,
            'recipe_id' => $this->recipe->id
        ]);
        $this->reset('ingredient_name');
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function destroy(Ingredient $ingredient){
        $ingredient->delete();
        $this->recipe = Recipe::find($this->recipe->id);
    }
}
