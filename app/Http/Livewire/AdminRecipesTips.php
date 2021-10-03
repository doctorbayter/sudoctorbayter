<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use App\Models\Tip;
use Livewire\Component;

class AdminRecipesTips extends Component
{
    public $recipe, $tip, $tip_name;

    protected $rules = [
        'tip.name' => 'required'
    ];


    public function mount(Recipe $recipe){
        $this->recipe = $recipe;

        $this->tip = new Tip();

    }

    public function render()
    {
        return view('livewire.admin-recipes-tips')->layout('layouts.admin');
    }

    public function edit(Tip $tip) {
        $this->tip = $tip;
    }

    public function update() {

        $this->validate();

        $this->tip->save();
        $this->tip = new Tip();
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function store() {

        $this->validate([
            'tip_name' => 'required'
        ]);

        Tip::create([
            'name' => $this->tip_name,
            'step' => $this->recipe->Tips->count() + 1,
            'recipe_id' => $this->recipe->id
        ]);
        $this->reset('tip_name');
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function destroy(Tip $tip){
        $tip->delete();
        $this->recipe = Recipe::find($this->recipe->id);
    }
}
