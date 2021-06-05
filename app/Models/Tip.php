<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relaciones uno a muchos inversa
    public function recipe()
    {
        return $this->belongsTo('App\Models\Recipe');
    }
}
