<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    const REVISION = 1;
    const PUBLICADO = 2;

    //URL's Amigables
    public function getRouteKeyName(){
        return "slug";
    }

    //Relaciones uno a muchos inversa
    public function discount(){
        return $this->belongsTo('App\Models\Discount');
    }

    //Relaciones muchos a muchos inversa
    public function clients()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion muchos a muchos
    public function plans()
    {
        return $this->belongsToMany('\App\Models\Plan');
    }

    public function days()
    {
        return $this->belongsToMany('\App\Models\Day');
    }

    public function weeks()
    {
        return $this->belongsToMany('\App\Models\Week')->withPivot(['resource']);
    }

    // Relacion uno a uno polimorfica
    public function resources(){
        return $this->morphMany('App\Models\Resource','resourceable');
    }
}
