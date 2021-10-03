<?php

namespace App\Http\Livewire;

use App\Models\Instruction;
use App\Models\Recipe;
use Livewire\Component;

class AdminRecipesInstructions extends Component
{
    public $recipe, $instruction, $instruction_name;

    protected $rules = [
        'instruction.name' => 'required'
    ];

    protected $listeners = ['dragged' => 'itemDragged'];

    public function mount(Recipe $recipe){
        $this->recipe = $recipe;

        $this->instruction = new Instruction();

    }

    public function render()
    {
        return view('livewire.admin-recipes-instructions')->layout('layouts.admin');
    }

    public function edit(Instruction $instruction) {
        $this->instruction = $instruction;
    }

    public function update() {

        $this->validate();

        $this->instruction->save();
        $this->instruction = new Instruction();
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function store() {

        $this->validate([
            'instruction_name' => 'required'
        ]);

        Instruction::create([
            'name' => $this->instruction_name,
            'step' => $this->recipe->instructions->count() + 1,
            'recipe_id' => $this->recipe->id
        ]);
        $this->reset('instruction_name');
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function destroy(Instruction $instruction){
        $instruction->delete();
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function itemDragged($current_index, $old_index, $new_index)
    {

        $new_step_instruction = $this->recipe->instructions->find($current_index);

        if($old_index != $new_index){

            $new_step_instruction->step = $new_index;
            $new_step_instruction->save();

            if($old_index < $new_index){
                $reorder_instructions = $this->recipe->instructions->where('id','!=', $current_index)->whereBetween('step', [$old_index, $new_index]);

                foreach ($reorder_instructions->sortBy('step') as $reorder ) {
                    $reorder->step = $reorder->step - 1;
                    $reorder->save();
                }

            }else{

                $reorder_instructions = $this->recipe->instructions->where('id','!=', $current_index)->whereBetween('step', [$new_index, $old_index]);
                foreach ($reorder_instructions->sortBy('step') as $reorder ) {
                    $reorder->step = $reorder->step + 1;
                    $reorder->save();
                }
            }

        }
    }
}
