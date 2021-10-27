<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use App\Models\Video;
use Livewire\Component;

class AdminRecipesVideo extends Component
{
    public $recipe, $video, $video_name;

    protected $rules = [
        'video.name' => 'required'
    ];

    public function mount(Recipe $recipe){

        $this->recipe = $recipe;
        $this->video = $recipe->video;

    }

    public function render()
    {
        return view('livewire.admin-recipes-video')->layout('layouts.admin');
    }

    public function update() {

        $this->validate();

        $this->recipe->video->update([
            'iframe'=> $this->video['name']
        ]);

        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function store() {

        $this->validate([
            'video_name' => 'required'
        ]);

        //<iframe src="https://player.vimeo.com/video/638693117?h=d5c97f5b2c" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>
        Video::create([
            'iframe' => $this->video_name,
            'videoable_id' => $this->recipe->id,
            'videoable_type' => 'App\Models\Recipe',
        ]);
        $this->reset('video_name');
        $this->recipe = Recipe::find($this->recipe->id);
    }

    public function destroy(){

        $this->recipe->video()->delete();
    }
}
