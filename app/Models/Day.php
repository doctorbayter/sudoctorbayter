<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }

    // Relaciones uno a uno polimorfica
    public function video(){
        return $this->morphOne('App\Models\Video', 'videoable');
    }

    //Relacion muchos a muchos
    public function recipes()
    {
        return $this->belongsToMany('\App\Models\Recipe')->withPivot(['meal'])->orderBy('day_recipe.meal');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }


    //Relacion muchos a muchos
    public function fase()
    {
        return $this->belongsTo('\App\Models\Fase');
    }

    public function weeks()
    {
        return $this->belongsToMany('\App\Models\Week');
    }
}
