<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion muchos a muchos
    public function fase()
    {
        return $this->belongsTo('\App\Models\Fase');
    }

    public function days()
    {
        return $this->belongsToMany('\App\Models\Day');
    }
}
