<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const BAJO = 1;
    const MEDIO = 2;
    const ALTO = 3;

    const DESAYUNO = 1;
    const ALMUERZO = 2;
    const CENA = 3;
    const SNACK = 4;
    const BEBIDAS = 5;
    const SALSITAS = 6;

    //URL's Amigables
    public function getRouteKeyName(){
        return "slug";
    }

    //Relaciones uno a muchos
    public function ingredients(){
        return $this->hasMany('App\Models\Ingredient');
    }
    public function instructions(){
        return $this->hasMany('App\Models\Instruction');
    }
    public function tips(){
        return $this->hasMany('App\Models\Tip');
    }

    //Relacion uno a muchos inversa
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    // Relaciones uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    public function video(){
        return $this->morphOne('App\Models\Video', 'videoable');
    }

    //Relaciones muchos a muchos inversa
    public function days(){
        return $this->belongsToMany('\App\Models\Day');
    }

}
