<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relaciones uno a muchos
    public function plans()
    {
        return $this->hasMany('App\Models\Plan');
    }
}
