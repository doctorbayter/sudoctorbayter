<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    const VALUE  = 1;
    const PERCENT  = 2;

    // Relaciones uno a muchos
    public function plans()    {
        return $this->hasMany('App\Models\Plan');
    }

}
