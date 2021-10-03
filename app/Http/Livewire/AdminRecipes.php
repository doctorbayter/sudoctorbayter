<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class AdminRecipes extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;

    public function render()
    {
        $recipes =  Recipe::where('name', 'LIKE', '%'. $this->search.'%')
                            ->orderBy('id')
                            ->paginate(25);

        return view('livewire.admin-recipes', compact('recipes'));
    }

    public function clear_page(){
        $this->reset('page');
    }
}
